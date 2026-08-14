<?php

namespace App\Queries\Projects;

use App\Models\Project;
use App\Services\Taxes\PaymentTaxCalculator;
use Carbon\Carbon;
use Illuminate\Support\Collection;

/**
 * Query for the project show page.
 *
 * Fetches the latest N items for each tab: tasks, meetings, payments, costs, documents.
 * Also returns total counts for each relation (used for "view all" links).
 * Sets the project relation on each item to prevent N+1 queries.
 */
class ProjectShowQuery
{
    public function __construct(
        private Project $project,
        private int $limit = 50
    ) {}

    public function handle(): array
    {
        $tsMonth = request()->integer('ts_month', now()->month);
        $tsYear  = request()->integer('ts_year', now()->year);
        $payments = $this->getPayments();

        return array_merge([
            'tasks'                => $this->getTasks(),
            'tasksCount'           => $this->project->tasks()->count(),
            'meetings'             => $this->getMeetings(),
            'meetingsCount'        => $this->project->meetings()->count(),
            'payments'             => $payments,
            'paymentTaxEstimates'  => (new PaymentTaxCalculator())->calculateForPayments($payments),
            'paymentsCount'        => $this->project->payments()->count(),
            'costs'                => $this->getCosts(),
            'costsCount'           => $this->project->costs()->count(),
            'documents'            => $this->getDocuments(),
            'documentsCount'       => $this->project->documents()->count(),
        ], $this->getTimesheetData($tsMonth, $tsYear));
    }

    private function getTasks(): Collection
    {
        return $this->project->tasks()
            ->with('taskDocuments')
            ->orderBy('order')
            ->latest()
            ->take($this->limit)
            ->get()
            ->each(function ($task) {
                $task->setRelation('project', $this->project);
                $task->taskDocuments->each->setRelation('task', $task);
            });
    }

    private function getMeetings(): Collection
    {
        return $this->project->meetings()
            ->latest('scheduled_at')
            ->take($this->limit)
            ->get()
            ->each->setRelation('project', $this->project);
    }

    private function getPayments(): Collection
    {
        return $this->project->payments()
            ->with('client')
            ->latest()
            ->take($this->limit)
            ->get()
            ->each->setRelation('project', $this->project);
    }

    private function getCosts(): Collection
    {
        return $this->project->costs()
            ->latest('paid_at')
            ->take($this->limit)
            ->get()
            ->each->setRelation('project', $this->project);
    }

    private function getDocuments(): Collection
    {
        return $this->project->documents()
            ->with('labels')
            ->latest('uploaded_at')
            ->take($this->limit)
            ->get()
            ->each->setRelation('project', $this->project);
    }

    private function getTimesheetData(int $tsMonth, int $tsYear): array
    {
        $currentTs     = $this->project->timesheets()
            ->where('month', $tsMonth)
            ->where('year', $tsYear)
            ->first();

        $existingHours = $currentTs ? ($currentTs->daily_hours ?? []) : [];
        $hourlyRate    = $currentTs?->hourly_rate ?? $this->project->hourly_rate ?? 0;
        $totalHours    = $currentTs ? $currentTs->totalHours() : 0;

        return [
            'currentTs'        => $currentTs,
            'timesheetMonths'  => $this->project->timesheets()->get(['id', 'year', 'month']),
            'tsMonth'          => $tsMonth,
            'tsYear'           => $tsYear,
            'existingHours'    => $existingHours,
            'weeks'            => $this->buildWeekGrid($tsMonth, $tsYear),
            'hourlyRate'       => $hourlyRate,
            'totalHours'       => $totalHours,
            'totalEarnings'    => $totalHours * (float) $hourlyRate,
            'monthNames'       => [
                1  => __('timesheets.months.january'),  2  => __('timesheets.months.february'),
                3  => __('timesheets.months.march'),    4  => __('timesheets.months.april'),
                5  => __('timesheets.months.may'),      6  => __('timesheets.months.june'),
                7  => __('timesheets.months.july'),     8  => __('timesheets.months.august'),
                9  => __('timesheets.months.september'),10 => __('timesheets.months.october'),
                11 => __('timesheets.months.november'), 12 => __('timesheets.months.december'),
            ],
        ];
    }

    private function buildWeekGrid(int $month, int $year): array
    {
        $firstDay    = Carbon::create($year, $month, 1);
        $daysInMonth = $firstDay->daysInMonth;

        $emptyWeek = [];
        for ($dow = 1; $dow <= 7; $dow++) {
            $emptyWeek[$dow] = ['day' => null, 'is_weekend' => $dow >= 6];
        }

        $weeks = [];
        $week  = $emptyWeek;

        for ($day = 1; $day <= $daysInMonth; $day++) {
            $dow               = Carbon::create($year, $month, $day)->dayOfWeekIso;
            $week[$dow]['day'] = $day;

            if ($dow === 7 || $day === $daysInMonth) {
                $weeks[] = $week;
                $week    = $emptyWeek;
            }
        }

        return $weeks;
    }
}
