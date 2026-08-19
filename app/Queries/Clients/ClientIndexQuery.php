<?php

namespace App\Queries\Clients;

use App\Models\Client;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

/**
 * Paginated query for the clients index page.
 *
 * Filters: status, acquisition_source, search (name/email/vat_number).
 * Sorting: whitelisted columns via sort_by/sort_direction params.
 * Pagination: 15 per page.
 */
class ClientIndexQuery
{
    private const ALLOWED_SORT_COLUMNS = ['name', 'email', 'status', 'created_at', 'updated_at'];
    private const ALLOWED_SORT_DIRECTIONS = ['asc', 'desc'];

    /**
     * Handle the query
     */
    public function handle(): LengthAwarePaginator
    {
        return $this->query()
            ->paginate(15)
            ->appends(request()->query());
    }

    /**
     * Build the filtered/sorted query without pagination, so it can be
     * reused for exports (e.g. Excel) honoring the same filters.
     */
    public function query(): Builder
    {
        return Client::query()
            ->withCount(['followups' => fn (Builder $query) => $query->where('completed', true)])
            ->withMax(['followups' => fn (Builder $query) => $query->where('completed', true)], 'contacted_at')
            ->when(request('status'), function ($query) {
                $query->where('status', request('status'));
            })
            ->when(request('followup_status'), function ($query) {
                $query->whereIn('status', ['lead', 'prospect']);

                match (request('followup_status')) {
                    'never' => $query->having('followups_count', '=', 0),
                    'first_contact' => $query->having('followups_count', '=', 1),
                    'second_contact' => $query->having('followups_count', '=', 2),
                    'exhausted' => $query->having('followups_count', '>=', 3),
                    default => null,
                };
            })
            ->when(request('acquisition_source'), function ($query) {
                $query->where('acquisition_source', request('acquisition_source'));
            })
            ->when(request('search'), function ($query) {
                $search = request('search');
                $query->where(function($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('vat_number', 'like', "%{$search}%");
                });
            })
            ->orderBy(
                $this->getSortColumn(),
                $this->getSortDirection()
            );
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