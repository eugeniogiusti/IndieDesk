<?php

namespace App\Services\Taxes;

use App\Models\BusinessSettings;
use App\Models\Payment;
use App\Services\Taxes\DTO\PaymentTaxEstimate;
use Illuminate\Support\Collection;

/**
 * Estimates INPS (Gestione Separata) contributions and imposta sostitutiva
 * due on paid payments, for a forfettario freelancer.
 *
 * Both INPS and the substitute tax apply to the *cumulative* taxable income
 * of the fiscal year (cash basis), not to each payment in isolation — INPS
 * because of the annual contribution ceiling, and the tax because its base
 * is the cumulative taxable income net of the INPS due so far. So each
 * payment's quota is derived by difference: (progressive total up to and
 * including this payment) - (progressive total before it).
 *
 * Rates come from the singleton BusinessSettings record. If any of them
 * isn't configured, no estimate is produced — never a guessed value.
 */
class PaymentTaxCalculator
{
    public function isConfigured(?BusinessSettings $settings = null): bool
    {
        $settings ??= BusinessSettings::current();

        return $settings->profitability_coefficient !== null
            && $settings->inps_rate !== null
            && $settings->substitute_tax_rate !== null;
    }

    public function calculateForPayment(Payment $payment): ?PaymentTaxEstimate
    {
        return $this->calculateForPayments(collect([$payment]))->get($payment->id);
    }

    /**
     * @param Collection<int, Payment> $payments
     * @return Collection<int, PaymentTaxEstimate> estimates keyed by payment id (unpaid/unconfigured payments are omitted)
     */
    public function calculateForPayments(Collection $payments): Collection
    {
        $settings = BusinessSettings::current();

        if (!$this->isConfigured($settings)) {
            return collect();
        }

        $coefficient = (float) $settings->profitability_coefficient / 100;
        $inpsRate = (float) $settings->inps_rate / 100;
        $taxRate = (float) $settings->substitute_tax_rate / 100;
        $ceiling = $settings->inps_ceiling !== null ? (float) $settings->inps_ceiling : null;
        $currency = $settings->default_currency;

        $years = $payments
            ->filter(fn (Payment $payment) => $payment->paid_at !== null)
            ->map(fn (Payment $payment) => $payment->paid_at->year)
            ->unique();

        $requestedIds = $payments->pluck('id')->all();
        $estimates = collect();

        foreach ($years as $year) {
            // The progressive cumulative total is computed across ALL payments
            // of the year, not just the ones passed in — INPS/tax are due on
            // the freelancer's whole income, regardless of which project it
            // belongs to. Restricted to the default currency: amounts in
            // other currencies can't be summed into the same cumulative base
            // without a conversion rate, so they're excluded (no estimate).
            $yearPayments = Payment::query()
                ->whereNotNull('paid_at')
                ->whereYear('paid_at', $year)
                ->where('currency', $currency)
                ->orderBy('paid_at')
                ->orderBy('id')
                ->get(['id', 'amount']);

            $cumulativeTaxable = 0.0;

            foreach ($yearPayments as $yearPayment) {
                $taxableIncome = round((float) $yearPayment->amount * $coefficient, 2);

                $cumulativeBefore = $cumulativeTaxable;
                $cumulativeTaxable += $taxableIncome;

                $inpsBaseBefore = $ceiling !== null ? min($cumulativeBefore, $ceiling) : $cumulativeBefore;
                $inpsBaseAfter = $ceiling !== null ? min($cumulativeTaxable, $ceiling) : $cumulativeTaxable;

                $inpsDueBefore = $inpsBaseBefore * $inpsRate;
                $inpsDueAfter = $inpsBaseAfter * $inpsRate;
                $inpsQuota = round($inpsDueAfter - $inpsDueBefore, 2);

                $fiscalBaseBefore = max($cumulativeBefore - $inpsDueBefore, 0.0);
                $fiscalBaseAfter = max($cumulativeTaxable - $inpsDueAfter, 0.0);

                $taxDueBefore = $fiscalBaseBefore * $taxRate;
                $taxDueAfter = $fiscalBaseAfter * $taxRate;
                $taxQuota = round($taxDueAfter - $taxDueBefore, 2);

                if (!in_array($yearPayment->id, $requestedIds, true)) {
                    continue;
                }

                $estimates->put($yearPayment->id, new PaymentTaxEstimate(
                    grossAmount: (float) $yearPayment->amount,
                    taxableIncome: $taxableIncome,
                    inpsAmount: $inpsQuota,
                    taxAmount: $taxQuota,
                ));
            }
        }

        return $estimates;
    }
}
