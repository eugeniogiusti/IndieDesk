<?php

namespace App\Services\Taxes;

use App\Models\BusinessSettings;
use App\Models\Payment;
use App\Models\Tax;
use App\Models\TaxFundMovement;
use Illuminate\Support\Carbon;

/**
 * Compares the balance of the freelancer's dedicated tax savings account
 * (sum of TaxFundMovement entries) against the estimated INPS + imposta
 * sostitutiva due on the current calendar year's income so far, net of
 * whatever has already been remitted (Tax records, module `/taxes`, with
 * reference_year matching the current year), so they know whether they're
 * on track or need to top it up.
 *
 * Always reflects the current year to date, independent of any reporting
 * period selected elsewhere (Statistics filters) — it's meant to answer
 * "am I covered right now", not to report on a past period.
 */
class TaxFundService
{
    public function balance(): float
    {
        return (float) TaxFundMovement::sum('amount');
    }

    /**
     * Total INPS + imposta sostitutiva estimated on this year's paid
     * payments so far. Null if the fiscal rates aren't configured.
     */
    public function dueThisYear(): ?float
    {
        $calculator = new PaymentTaxCalculator();

        if (!$calculator->isConfigured()) {
            return null;
        }

        $currency = BusinessSettings::current()->default_currency;
        $year = Carbon::now()->year;

        $payments = Payment::paid()
            ->where('currency', $currency)
            ->whereYear('paid_at', $year)
            ->get(['id', 'paid_at', 'amount']);

        return round(
            $calculator->calculateForPayments($payments)
                ->sum(fn ($estimate) => $estimate->inpsAmount + $estimate->taxAmount),
            2
        );
    }

    /**
     * Taxes already remitted for the current year, i.e. Tax records whose
     * reference_year is this year and that are marked paid. Filtered by
     * reference_year (not paid_at) so a late payment for a past year's
     * liability — paid now, out of pocket — never nets against this year's
     * fund target.
     */
    public function paidThisYear(): float
    {
        return (float) Tax::paid()
            ->referenceYear(Carbon::now()->year)
            ->sum('amount');
    }

    /**
     * What's left to set aside for the current year: the estimate minus
     * whatever's already been remitted, floored at 0. Null if rates aren't
     * configured.
     */
    public function remainingDue(): ?float
    {
        $due = $this->dueThisYear();

        return $due === null ? null : max(round($due - $this->paidThisYear(), 2), 0.0);
    }

    /**
     * Balance minus what's left to set aside. Positive = surplus, negative
     * = shortfall (how much still needs to be topped up). Null if rates
     * aren't configured.
     */
    public function difference(): ?float
    {
        $remaining = $this->remainingDue();

        return $remaining === null ? null : round($this->balance() - $remaining, 2);
    }

    /**
     * Keeps this tax's auto-generated withdrawal in sync with its paid
     * state: creates/updates a matching TaxFundMovement while it's paid
     * (amount known), removes it otherwise (unpaid, or amount cleared).
     * Called after a Tax is created or updated.
     */
    public function syncFromTax(Tax $tax): void
    {
        if ($tax->paid_at === null || $tax->amount === null) {
            TaxFundMovement::where('tax_id', $tax->id)->delete();

            return;
        }

        TaxFundMovement::updateOrCreate(
            ['tax_id' => $tax->id],
            [
                'date' => $tax->paid_at,
                'amount' => -abs((float) $tax->amount),
                'notes' => __('tax_fund.auto_note_tax_payment', ['description' => $tax->description]),
            ]
        );
    }
}
