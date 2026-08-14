<?php

namespace App\Queries\Dashboard;

use App\Models\BusinessSettings;
use App\Models\Cost;
use App\Models\Payment;
use App\Services\Taxes\PaymentTaxCalculator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

/**
 * Annual trend chart data for the dashboard.
 *
 * Returns 12-month arrays: labels (translated month abbreviations),
 * payments, costs, and profit (payments - costs) per month, plus a
 * `totals` array (year-to-date payments/costs/profit/estimated_tax/
 * display_profit) for the chart card header.
 * All amounts filtered by the default currency from BusinessSettings.
 */
class DashboardChartQuery
{
    private string $currency;

    public function handle(): array
    {
        $this->currency = BusinessSettings::current()->default_currency;

        $months = $this->getCurrentYearMonths();

        $payments = $this->getMonthlyPayments($months);
        $costs = $this->getMonthlyCosts($months);
        $totalPayments = array_sum($payments);
        $totalCosts = array_sum($costs);
        $totalProfit = $totalPayments - $totalCosts;
        $estimatedTax = $this->getEstimatedTaxThisYear();

        return [
            'labels' => $months->pluck('label')->toArray(),
            'payments' => $payments,
            'costs' => $costs,
            'profit' => collect($payments)->map(fn($p, $i) => $p - $costs[$i])->values()->toArray(),
            'totals' => [
                'payments' => $totalPayments,
                'costs' => $totalCosts,
                'profit' => $totalProfit,
                'estimated_tax' => $estimatedTax,
                'display_profit' => $estimatedTax === null ? $totalProfit : round($totalProfit - $estimatedTax, 2),
            ],
        ];
    }

    private function getEstimatedTaxThisYear(): ?float
    {
        $calculator = new PaymentTaxCalculator();

        if (!$calculator->isConfigured()) {
            return null;
        }

        $payments = Payment::paid()
            ->where('currency', $this->currency)
            ->thisYear()
            ->get(['id', 'paid_at', 'amount']);

        return round(
            $calculator->calculateForPayments($payments)
                ->sum(fn ($estimate) => $estimate->inpsAmount + $estimate->taxAmount),
            2
        );
    }

    private function getCurrentYearMonths(): Collection
    {
        $year = now()->year;

        return collect(range(1, 12))->map(function ($month) use ($year) {
            $date = now()->setDate($year, $month, 1);
            return [
                'key' => $date->format('Y-m'),
                'label' => $date->translatedFormat('M'),
                'start' => $date->copy()->startOfMonth(),
                'end' => $date->copy()->endOfMonth(),
            ];
        });
    }

    private function monthExpr(): string
    {
        return DB::connection()->getDriverName() === 'sqlite'
            ? "strftime('%Y-%m', paid_at)"
            : "DATE_FORMAT(paid_at, '%Y-%m')";
    }

    private function getMonthlyPayments(Collection $months): array
    {
        $payments = Payment::paid()
            ->where('currency', $this->currency)
            ->thisYear()
            ->selectRaw("{$this->monthExpr()} as month, SUM(amount) as total")
            ->groupBy('month')
            ->pluck('total', 'month');

        return $months->map(fn($m) => (float) ($payments[$m['key']] ?? 0))->values()->toArray();
    }

    private function getMonthlyCosts(Collection $months): array
    {
        $costs = Cost::where('currency', $this->currency)
            ->thisYear()
            ->selectRaw("{$this->monthExpr()} as month, SUM(amount) as total")
            ->groupBy('month')
            ->pluck('total', 'month');

        return $months->map(fn($m) => (float) ($costs[$m['key']] ?? 0))->values()->toArray();
    }
}
