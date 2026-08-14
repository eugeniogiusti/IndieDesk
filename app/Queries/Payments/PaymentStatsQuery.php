<?php

namespace App\Queries\Payments;

use App\Models\BusinessSettings;
use App\Models\Payment;
use App\Services\Taxes\PaymentTaxCalculator;

/**
 * Payment statistics for the index stat cards.
 *
 * Returns: total_all_time, total_this_month, total_this_year, and the
 * estimated INPS + imposta sostitutiva on this year's payments (null if
 * the fiscal rates aren't configured). Not computed for total_all_time:
 * the estimate always uses TODAY's rates, so applying it retroactively
 * across multiple fiscal years (which may have had different rates) would
 * be misleading. All amounts filtered by the default currency from
 * BusinessSettings.
 */
class PaymentStatsQuery
{
    private string $currency;

    public function handle(): array
    {
        $this->currency = BusinessSettings::current()->default_currency;

        return [
            'total_all_time' => $this->getTotalAllTime(),
            'total_this_month' => $this->getTotalThisMonth(),
            'total_this_year' => $this->getTotalThisYear(),
            'estimated_tax_this_year' => $this->getEstimatedTaxThisYear(),
            'estimated_tax_this_month' => $this->getEstimatedTaxThisMonth(),
        ];
    }

    private function getTotalAllTime(): float
    {
        return Payment::whereNotNull('paid_at')
            ->where('currency', $this->currency)
            ->sum('amount');
    }

    private function getTotalThisMonth(): float
    {
        return Payment::where('currency', $this->currency)
            ->thisMonth()
            ->sum('amount');
    }

    private function getTotalThisYear(): float
    {
        return Payment::where('currency', $this->currency)
            ->thisYear()
            ->sum('amount');
    }

    private function getEstimatedTaxThisYear(): ?float
    {
        return $this->getEstimatedTax(
            Payment::paid()->where('currency', $this->currency)->thisYear()
        );
    }

    private function getEstimatedTaxThisMonth(): ?float
    {
        return $this->getEstimatedTax(
            Payment::paid()->where('currency', $this->currency)->thisMonth()
        );
    }

    private function getEstimatedTax($query): ?float
    {
        $calculator = new PaymentTaxCalculator();

        if (!$calculator->isConfigured()) {
            return null;
        }

        $payments = $query->get(['id', 'paid_at', 'amount']);

        return round(
            $calculator->calculateForPayments($payments)
                ->sum(fn ($estimate) => $estimate->inpsAmount + $estimate->taxAmount),
            2
        );
    }
}
