<?php

namespace App\Queries\Statistics\SubQueries;

use App\Models\BusinessSettings;
use App\Models\Client;
use App\Models\Cost;
use App\Models\Payment;
use App\Models\Project;
use App\Models\Task;
use App\Services\Taxes\PaymentTaxCalculator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

/**
 * Monthly breakdown table for the statistics page (sub-query of StatisticsQuery).
 *
 * Returns a collection of 12 months, each with: payments, costs, profit,
 * net_profit (profit minus estimated tax, null if fiscal rates aren't
 * configured), estimated_tax, projects created, tasks completed, new clients.
 * Financial amounts filtered by the default currency from BusinessSettings.
 */
class MonthlyBreakdownQuery
{
    private string $currency;

    public function __construct(
        private int $year
    ) {}

    public function handle(): Collection
    {
        $this->currency = BusinessSettings::current()->default_currency;
        $months = $this->getMonthsStructure();

        $payments = $this->getPaymentsData();
        $costs = $this->getCostsData();
        $projects = $this->getProjectsData();
        $tasks = $this->getTasksData();
        $clients = $this->getClientsData();
        $taxByMonth = $this->getEstimatedTaxByMonth();

        return $months->map(function ($m) use ($payments, $costs, $projects, $tasks, $clients, $taxByMonth) {
            $p = (float) ($payments[$m['key']] ?? 0);
            $c = (float) ($costs[$m['key']] ?? 0);
            $profit = $p - $c;
            $estimatedTax = $taxByMonth === null ? null : ($taxByMonth[$m['key']] ?? 0.0);
            $netProfit = $estimatedTax === null ? null : round($profit - $estimatedTax, 2);

            return [
                'month' => $m['month'],
                'label' => $m['label'],
                'is_current_month' => $m['month'] === now()->month && $this->year === now()->year,
                'payments' => $p,
                'costs' => $c,
                'profit' => $profit,
                'estimated_tax' => $estimatedTax,
                'net_profit' => $netProfit,
                'display_profit' => $netProfit ?? $profit,
                'projects' => (int) ($projects[$m['key']] ?? 0),
                'tasks' => (int) ($tasks[$m['key']] ?? 0),
                'clients' => (int) ($clients[$m['key']] ?? 0),
            ];
        });
    }

    /**
     * Estimated INPS + imposta sostitutiva per month, keyed like the other
     * per-month maps ("Y-m"). Null (not an empty collection) if the fiscal
     * rates aren't configured, so callers can tell "no estimate possible"
     * apart from "zero tax this month".
     */
    private function getEstimatedTaxByMonth(): ?Collection
    {
        $calculator = new PaymentTaxCalculator();

        if (!$calculator->isConfigured()) {
            return null;
        }

        $payments = Payment::paid()
            ->where('currency', $this->currency)
            ->whereYear('paid_at', $this->year)
            ->get(['id', 'paid_at', 'amount']);

        $monthByPaymentId = $payments->mapWithKeys(
            fn (Payment $payment) => [$payment->id => $payment->paid_at->format('Y-m')]
        );

        return $calculator->calculateForPayments($payments)
            ->groupBy(fn ($estimate, $id) => $monthByPaymentId[$id])
            ->map(fn (Collection $estimates) => round($estimates->sum(fn ($e) => $e->inpsAmount + $e->taxAmount), 2));
    }

    private function getMonthsStructure(): Collection
    {
        return collect(range(1, 12))->map(fn($month) => [
            'month' => $month,
            'label' => Carbon::create($this->year, $month, 1)->translatedFormat('F'),
            'key' => sprintf('%d-%02d', $this->year, $month),
        ]);
    }

    private function dateExpr(string $column): string
    {
        return match(config('database.default')) {
            'mysql' => "DATE_FORMAT({$column}, '%Y-%m')",
            default => "strftime('%Y-%m', {$column})",
        };
    }

    private function getPaymentsData(): Collection
    {
        return Payment::paid()
            ->where('currency', $this->currency)
            ->whereYear('paid_at', $this->year)
            ->selectRaw($this->dateExpr('paid_at') . " as month, SUM(amount) as total")
            ->groupBy('month')
            ->pluck('total', 'month');
    }

    private function getCostsData(): Collection
    {
        return Cost::where('currency', $this->currency)
            ->whereYear('paid_at', $this->year)
            ->selectRaw($this->dateExpr('paid_at') . " as month, SUM(amount) as total")
            ->groupBy('month')
            ->pluck('total', 'month');
    }

    private function getProjectsData(): Collection
    {
        return Project::whereYear('created_at', $this->year)
            ->selectRaw($this->dateExpr('created_at') . " as month, COUNT(*) as total")
            ->groupBy('month')
            ->pluck('total', 'month');
    }

    private function getTasksData(): Collection
    {
        return Task::where('status', 'done')
            ->whereYear('updated_at', $this->year)
            ->selectRaw($this->dateExpr('updated_at') . " as month, COUNT(*) as total")
            ->groupBy('month')
            ->pluck('total', 'month');
    }

    private function getClientsData(): Collection
    {
        return Client::whereYear('created_at', $this->year)
            ->selectRaw($this->dateExpr('created_at') . " as month, COUNT(*) as total")
            ->groupBy('month')
            ->pluck('total', 'month');
    }
}
