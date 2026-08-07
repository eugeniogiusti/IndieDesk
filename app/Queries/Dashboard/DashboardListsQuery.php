<?php

namespace App\Queries\Dashboard;

use App\Models\Cost;
use App\Models\Meeting;
use App\Models\Payment;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Support\Collection;

/**
 * Quick-reference lists for the dashboard page.
 *
 * Returns 6 lists (max 5 items each): tasks_due_soon (next 7 days),
 * upcoming_meetings, overdue_payments, recent_payments, recent_costs, projects_due_soon.
 * Uses batch project hydration to prevent N+1 queries across all lists.
 */
class DashboardListsQuery
{
    public function handle(): array
    {
        $tasksDueSoon = $this->getTasksDueSoon();
        $upcomingMeetings = $this->getUpcomingMeetings();
        $overduePayments = $this->getOverduePayments();
        $recentPayments = $this->getRecentPayments();
        $recentCosts = $this->getRecentCosts();
        $projectsDueSoon = $this->getProjectsDueSoon();

        $this->hydrateProjects([
            $tasksDueSoon,
            $upcomingMeetings,
            $overduePayments,
            $recentPayments,
            $recentCosts,
        ]);

        return [
            'tasks_due_soon' => $tasksDueSoon,
            'upcoming_meetings' => $upcomingMeetings,
            'overdue_payments' => $overduePayments,
            'recent_payments' => $recentPayments,
            'recent_costs' => $recentCosts,
            'projects_due_soon' => $projectsDueSoon,
        ];
    }

    /**
     * Tasks with due_date in next 7 days (not done)
     */
    private function getTasksDueSoon(): Collection
    {
        return Task::query()
            ->with('taskDocuments')
            ->open()
            ->whereNotNull('due_date')
            ->whereBetween('due_date', [now(), now()->addDays(7)])
            ->orderBy('due_date')
            ->take(5)
            ->get();
    }

    /**
     * Next 5 upcoming meetings (scheduled, future)
     */
    private function getUpcomingMeetings(): Collection
    {
        return Meeting::query()
            ->upcoming()
            ->take(5)
            ->get();
    }

    /**
     * Overdue payments (pending + past due_date)
     */
    private function getOverduePayments(): Collection
    {
        return Payment::query()
            ->with('client:id,name')
            ->overdue()
            ->orderBy('due_date')
            ->take(5)
            ->get();
    }

    /**
     * Last 5 received payments
     */
    private function getRecentPayments(): Collection
    {
        return Payment::query()
            ->with('client:id,name')
            ->paid()
            ->latest('paid_at')
            ->take(5)
            ->get();
    }

    /**
     * Last 5 registered costs
     */
    private function getRecentCosts(): Collection
    {
        return Cost::query()
            ->whereNotNull('paid_at')
            ->latest('paid_at')
            ->take(5)
            ->get();
    }

    private function hydrateProjects(array $lists): void
    {
        $projectIds = collect($lists)
            ->flatMap(fn (Collection $items) => $items->pluck('project_id'))
            ->filter()
            ->unique()
            ->values();

        if ($projectIds->isEmpty()) {
            return;
        }

        $projects = Project::with(['client:id,name', 'clients:id,name'])
            ->select('id', 'name', 'client_id', 'type')
            ->whereIn('id', $projectIds)
            ->get()
            ->keyBy('id');

        foreach ($lists as $items) {
            foreach ($items as $item) {
                if (!$item->project_id) {
                    continue;
                }
                if (isset($projects[$item->project_id])) {
                    $item->setRelation('project', $projects[$item->project_id]);
                }
            }
        }
    }

    /**
     * Projects with nearest due_date (active only)
     */
    private function getProjectsDueSoon(): Collection
    {
        return Project::with(['client:id,name', 'clients:id,name'])
            ->where('status', 'in_progress')
            ->whereNotNull('due_date')
            ->where('due_date', '>=', now())
            ->orderBy('due_date')
            ->take(5)
            ->get();
    }
}
