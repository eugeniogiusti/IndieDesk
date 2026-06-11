<?php

namespace App\Queries\Statistics\SubQueries;

use App\Models\Client;
use App\Models\Meeting;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Support\Carbon;

/**
 * Operational statistics for a date range (sub-query of StatisticsQuery).
 *
 * Returns: projects_started, projects_completed, tasks_completed,
 * meetings_held, new_clients — all within the given date range.
 */
class OperationalStatsQuery
{
    public function __construct(
        private Carbon $startDate,
        private Carbon $endDate
    ) {}

    public function handle(): array
    {
        return [
            'projects_started' => $this->getProjectsStarted(),
            'projects_completed' => $this->getProjectsCompleted(),
            'tasks_completed' => $this->getTasksCompleted(),
            'meetings_held' => $this->getMeetingsHeld(),
            'new_clients' => $this->getNewClients(),
        ];
    }

    private function getProjectsStarted(): int
    {
        return Project::whereBetween('created_at', [$this->startDate, $this->endDate])->count();
    }

    private function getProjectsCompleted(): int
    {
        return Project::where('status', 'completed')
            ->whereBetween('updated_at', [$this->startDate, $this->endDate])
            ->count();
    }

    private function getTasksCompleted(): int
    {
        return Task::where('status', 'done')
            ->whereBetween('updated_at', [$this->startDate, $this->endDate])
            ->count();
    }

    private function getMeetingsHeld(): int
    {
        return Meeting::where('status', 'completed')
            ->whereBetween('scheduled_at', [$this->startDate, $this->endDate])
            ->count();
    }

    private function getNewClients(): int
    {
        return Client::where('status', 'active')
            ->whereBetween('created_at', [$this->startDate, $this->endDate])
            ->count();
    }
}
