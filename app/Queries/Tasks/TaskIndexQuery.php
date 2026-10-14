<?php

namespace App\Queries\Tasks;

use App\Models\Task;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Paginated query for the tasks index page.
 *
 * Filters: project_id, status, type, priority, date_from/date_to (due_date), search (title/description/project name).
 * Eager loads: project.
 * Sorting: order asc, then created_at desc. Pagination: 20 per page.
 */
class TaskIndexQuery
{
    public function handle(): LengthAwarePaginator
    {
        return Task::query()
            ->with(['project', 'taskDocuments'])
            ->when(request('project_id'), function ($query, $projectId) {
                $query->where('project_id', $projectId);
            })
            ->when(request('status'), function ($query, $status) {
                $query->status($status);
            })
            ->when(request('type'), function ($query, $type) {
                $query->type($type);
            })
            ->when(request('priority'), function ($query, $priority) {
                $query->priority($priority);
            })
            ->when(request('date_from'), function ($query, $date) {
                $query->whereDate('due_date', '>=', $date);
            })
            ->when(request('date_to'), function ($query, $date) {
                $query->whereDate('due_date', '<=', $date);
            })
            ->when(request('search'), function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'LIKE', "%{$search}%")
                      ->orWhere('description', 'LIKE', "%{$search}%")
                      ->orWhereHas('project', function ($projectQuery) use ($search) {
                          $projectQuery->where('name', 'LIKE', "%{$search}%");
                      });
                });
            })
            ->orderBy('order')
            ->orderBy('created_at', 'desc')
            ->paginate(20);
    }
}