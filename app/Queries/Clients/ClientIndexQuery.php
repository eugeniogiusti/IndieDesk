<?php

namespace App\Queries\Clients;

use App\Enums\AcquisitionSource;
use App\Models\Client;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Paginated query for the clients index page.
 *
 * Filters: status, acquisition_source_category, search (name/email/vat_number).
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
        return Client::query()
            ->when(request('status'), function ($query) {
                $query->where('status', request('status'));
            })
            ->when(request('acquisition_source_category'), function ($query) {
                $category = request('acquisition_source_category');
                $sourcesByCategory = $this->getSourcesByCategory($category);
                $query->whereIn('acquisition_source', $sourcesByCategory);
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
            )
            ->paginate(15)
            ->appends(request()->query());
    }

    private function getSourcesByCategory(string $category): array
    {
        $categoryMap = [
            'direct_search' => [
                'search_linkedin',
                'search_google',
                'search_instagram',
                'search_x',
                'search_facebook',
                'search_thread',
                'search_bluesky',
            ],
            'organic' => [
                'organic_website',
                'organic_blog',
                'organic_facebook',
                'organic_instagram',
                'organic_reddit',
                'organic_x',
                'organic_thread',
                'organic_bluesky',
            ],
            'ads' => [
                'ads_google',
                'ads_facebook',
                'ads_instagram',
                'ads_reddit',
            ],
            'sponsorship' => [
                'sponsorship_influencer',
            ],
            'other' => [
                'other_word_of_mouth',
                'other_cold_contact',
            ],
        ];

        return $categoryMap[$category] ?? [];
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