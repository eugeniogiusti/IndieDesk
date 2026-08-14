<?php

namespace App\Queries\Statistics\SubQueries;

use App\Models\BusinessSettings;
use App\Models\Cost;
use App\Models\Payment;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

/**
 * Chart data for the statistics page (sub-query of StatisticsQuery).
 *
 * Two modes: monthly (12 data points for a full year) or daily (N days for a single month).
 * Returns: labels, payments, costs, profit arrays.
 * All amounts filtered by the default currency from BusinessSettings.
 */
class ChartDataQuery
{
    private string $currency;

    public function __construct(
        private int $year,
        private ?int $month = null
    ) {}

    public function handle(): array
    {
        $this->currency = BusinessSettings::current()->default_currency;

        return $this->month
            ? $this->getDailyData()
            : $this->getMonthlyData();
    }

    private function getMonthlyData(): array
    {
        $months = collect(range(1, 12))->map(fn($m) => [
            'key' => sprintf('%d-%02d', $this->year, $m),
            'label' => Carbon::create($this->year, $m, 1)->translatedFormat('M'),
        ]);

        $payments = $this->getMonthlyPayments();
        $costs = $this->getMonthlyCosts();

        $paymentsArray = $months->map(fn($m) => (float) ($payments[$m['key']] ?? 0))->values()->toArray();
        $costsArray = $months->map(fn($m) => (float) ($costs[$m['key']] ?? 0))->values()->toArray();

        return [
            'type' => 'monthly',
            'title' => __('statistics.chart_title'),
            'labels' => $months->pluck('label')->toArray(),
            'payments' => $paymentsArray,
            'costs' => $costsArray,
            'profit' => collect($paymentsArray)->map(fn($p, $i) => $p - $costsArray[$i])->values()->toArray(),
        ];
    }

    private function getDailyData(): array
    {
        $daysInMonth = Carbon::create($this->year, $this->month, 1)->daysInMonth;

        $days = collect(range(1, $daysInMonth))->map(fn($d) => [
            'key' => sprintf('%d-%02d-%02d', $this->year, $this->month, $d),
            'label' => (string) $d,
        ]);

        $payments = $this->getDailyPayments();
        $costs = $this->getDailyCosts();

        $paymentsArray = $days->map(fn($d) => (float) ($payments[$d['key']] ?? 0))->values()->toArray();
        $costsArray = $days->map(fn($d) => (float) ($costs[$d['key']] ?? 0))->values()->toArray();

        return [
            'type' => 'daily',
            'title' => __('statistics.chart_title_monthly'),
            'labels' => $days->pluck('label')->toArray(),
            'payments' => $paymentsArray,
            'costs' => $costsArray,
            'profit' => collect($paymentsArray)->map(fn($p, $i) => $p - $costsArray[$i])->values()->toArray(),
        ];
    }

    private function dateExpr(string $format): string
    {
        return DB::connection()->getDriverName() === 'sqlite'
            ? "strftime('{$format}', paid_at)"
            : "DATE_FORMAT(paid_at, '{$format}')";
    }

    private function getMonthlyPayments(): Collection
    {
        return Payment::paid()
            ->where('currency', $this->currency)
            ->whereYear('paid_at', $this->year)
            ->selectRaw("{$this->dateExpr('%Y-%m')} as period, SUM(amount) as total")
            ->groupBy('period')
            ->pluck('total', 'period');
    }

    private function getMonthlyCosts(): Collection
    {
        return Cost::where('currency', $this->currency)
            ->whereYear('paid_at', $this->year)
            ->selectRaw("{$this->dateExpr('%Y-%m')} as period, SUM(amount) as total")
            ->groupBy('period')
            ->pluck('total', 'period');
    }

    private function getDailyPayments(): Collection
    {
        return Payment::paid()
            ->where('currency', $this->currency)
            ->whereYear('paid_at', $this->year)
            ->whereMonth('paid_at', $this->month)
            ->selectRaw("{$this->dateExpr('%Y-%m-%d')} as period, SUM(amount) as total")
            ->groupBy('period')
            ->pluck('total', 'period');
    }

    private function getDailyCosts(): Collection
    {
        return Cost::where('currency', $this->currency)
            ->whereYear('paid_at', $this->year)
            ->whereMonth('paid_at', $this->month)
            ->selectRaw("{$this->dateExpr('%Y-%m-%d')} as period, SUM(amount) as total")
            ->groupBy('period')
            ->pluck('total', 'period');
    }
}
