<?php

namespace App\Queries\Dashboard;

use App\Models\BusinessSettings;
use App\Models\Cost;
use App\Models\Meeting;
use App\Models\Payment;
use App\Models\Project;
use App\Models\Task;
use App\Services\Taxes\PaymentTaxCalculator;

/**
 * KPI statistics for the dashboard stat cards.
 *
 * Returns: profit_this_month (payments - costs), pending_payments (count/total/overdue),
 * active_projects count, open_tasks (breakdown by status), meetings_this_week count.
 * Financial amounts filtered by the default currency from BusinessSettings.
 */
class DashboardStatsQuery
{
    private string $currency;
    public function handle(): array
    {
        $this->currency = BusinessSettings::current()->default_currency;

        return [
            'profit_this_month' => $this->getProfitThisMonth(),
            'pending_payments' => $this->getPendingPayments(),
            'active_projects' => $this->getActiveProjectsCount(),
            'open_tasks' => $this->getOpenTasksCount(),
            'meetings_this_week' => $this->getMeetingsThisWeekCount(),
        ];
    }

    private function getProfitThisMonth(): array
    {
        $payments = Payment::currency($this->currency)
            ->thisMonth()
            ->sum('amount');

        $costs = Cost::where('currency', $this->currency)
            ->whereBetween('paid_at', [now()->startOfMonth(), now()->endOfMonth()])
            ->sum('amount');

        $profit = $payments - $costs;
        $estimatedTax = $this->getEstimatedTaxThisMonth();

        return [
            'amount' => $estimatedTax === null ? $profit : round($profit - $estimatedTax, 2),
            'gross_amount' => $profit,
            'payments' => $payments,
            'costs' => $costs,
            'estimated_tax' => $estimatedTax,
        ];
    }

    private function getEstimatedTaxThisMonth(): ?float
    {
        $calculator = new PaymentTaxCalculator();

        if (!$calculator->isConfigured()) {
            return null;
        }

        $payments = Payment::paid()
            ->where('currency', $this->currency)
            ->whereBetween('paid_at', [now()->startOfMonth(), now()->endOfMonth()])
            ->get(['id', 'paid_at', 'amount']);

        return round(
            $calculator->calculateForPayments($payments)
                ->sum(fn ($estimate) => $estimate->inpsAmount + $estimate->taxAmount),
            2
        );
    }

    /**
     * Pending payments (not yet received)
     */
    private function getPendingPayments(): array
    {
        $query = Payment::pending()->where('currency', $this->currency);

        return [
            'count' => (clone $query)->count(),
            'total' => (clone $query)->sum('amount'),
            'overdue_count' => Payment::overdue()->count(),
        ];
    }

    /**
     * Active projects count (in_progress)
     */
    private function getActiveProjectsCount(): int
    {
        return Project::where('status', 'in_progress')->count();
    }

    /**
     * Open tasks count (todo + in_progress)
     */
    private function getOpenTasksCount(): array
    {
        return [
            'total' => Task::open()->count(),
            'todo' => Task::status('todo')->count(),
            'in_progress' => Task::status('in_progress')->count(),
            'blocked' => Task::status('blocked')->count(),
        ];
    }

    /**
     * Meetings this week count
     */
    private function getMeetingsThisWeekCount(): int
    {
        return Meeting::scheduled()->thisWeek()->count();
    }
}
