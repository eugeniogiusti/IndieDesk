<?php

namespace App\Queries\Statistics\SubQueries;

use App\Models\BusinessSettings;
use App\Models\Cost;
use App\Models\Payment;
use App\Services\Taxes\PaymentTaxCalculator;
use Illuminate\Support\Carbon;

/**
 * Financial statistics for a date range (sub-query of StatisticsQuery).
 *
 * Returns: payments total, costs total, profit (payments - costs),
 * pending payments amount, estimated INPS + imposta sostitutiva due on the
 * period's payments (null if the fiscal rates aren't configured) — all
 * within the given date range. Amounts filtered by the default currency
 * from BusinessSettings.
 */
class FinancialStatsQuery
{
    private string $currency;

    public function __construct(
        private Carbon $startDate,
        private Carbon $endDate
    ) {}

    public function handle(): array
    {
        $this->currency = BusinessSettings::current()->default_currency;
        $payments = $this->getPayments();
        $costs = $this->getCosts();
        $profit = $payments - $costs;
        $estimatedTax = $this->getEstimatedTax();

        $netProfit = $estimatedTax === null ? null : round($profit - $estimatedTax, 2);

        return [
            'payments' => $payments,
            'costs' => $costs,
            'profit' => $profit,
            'net_profit' => $netProfit,
            // Net profit when it can be computed, gross otherwise — what
            // views should actually render, so they never need to fall
            // back to `net_profit ?? profit` themselves.
            'display_profit' => $netProfit ?? $profit,
            'pending' => $this->getPending(),
            'estimated_tax' => $estimatedTax,
        ];
    }

    private function getPayments(): float
    {
        return (float) Payment::paid()
            ->where('currency', $this->currency)
            ->whereBetween('paid_at', [$this->startDate, $this->endDate])
            ->sum('amount');
    }

    private function getCosts(): float
    {
        return (float) Cost::where('currency', $this->currency)
            ->whereBetween('paid_at', [$this->startDate, $this->endDate])
            ->sum('amount');
    }

    private function getPending(): float
    {
        return (float) Payment::pending()
            ->where('currency', $this->currency)
            ->whereHas('project', fn($q) => $q->whereBetween('created_at', [$this->startDate, $this->endDate]))
            ->sum('amount');
    }

    private function getEstimatedTax(): ?float
    {
        $calculator = new PaymentTaxCalculator();

        if (!$calculator->isConfigured()) {
            return null;
        }

        $payments = Payment::paid()
            ->where('currency', $this->currency)
            ->whereBetween('paid_at', [$this->startDate, $this->endDate])
            ->get(['id', 'paid_at', 'amount']);

        return round(
            $calculator->calculateForPayments($payments)
                ->sum(fn ($estimate) => $estimate->inpsAmount + $estimate->taxAmount),
            2
        );
    }
}
