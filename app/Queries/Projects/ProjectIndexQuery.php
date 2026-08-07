<?php

namespace App\Queries\Projects;

use App\Models\Project;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Paginated query for the projects index page.
 *
 * Filters: status, priority, search (name/client name/client vat_number).
 * Sorting: whitelisted columns via sort_by/sort_direction params.
 * Eager loads: client. Pagination: 15 per page.
 */
class ProjectIndexQuery
{
    private const ALLOWED_SORT_COLUMNS = ['name', 'status', 'priority', 'type', 'created_at', 'updated_at', 'start_date', 'due_date'];
    private const ALLOWED_SORT_DIRECTIONS = ['asc', 'desc'];

    /**
     * Handle the query
     */
    public function handle(): LengthAwarePaginator
    {
        return Project::with(['client', 'clients'])
            ->when(request('status'), function ($query) {
                $query->where('status', request('status'));
            })
            ->when(request('priority'), function ($query) {
                $query->where('priority', request('priority'));
            })
            ->when(request('client_id'), function ($query) {
                $query->forClient(request('client_id'));
            })
            ->when(request('search'), function ($query) {
                $search = request('search');
                $query->where(function($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhereHas('client', function($clientQuery) use ($search) {
                          $clientQuery->where('name', 'like', "%{$search}%")
                                      ->orWhere('vat_number', 'like', "%{$search}%");
                      })
                      ->orWhereHas('clients', function($clientQuery) use ($search) {
                          $clientQuery->where('name', 'like', "%{$search}%")
                                      ->orWhere('vat_number', 'like', "%{$search}%");
                      });
                });
            })
            ->orderBy(
                $this->getSortColumn(),
                $this->getSortDirection()
            )
            ->paginate(15)
            ->appends(request()->query());
    }

    private function getSortColumn(): string
    {
        $column = request('sort_by', 'created_at');
        return in_array($column, self::ALLOWED_SORT_COLUMNS) ? $column : 'created_at';
    }

    private function getSortDirection(): string
    {
        $direction = strtolower(request('sort_direction', 'desc'));
        return in_array($direction, self::ALLOWED_SORT_DIRECTIONS) ? $direction : 'desc';
    }
}