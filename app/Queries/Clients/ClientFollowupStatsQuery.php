<?php

namespace App\Queries\Clients;

use App\Models\Client;
use Illuminate\Database\Eloquent\Builder;

/**
 * Follow-up stage counts for lead/prospect clients, based on completed
 * follow-ups only. Mirrors the followup_status index filter buckets.
 */
class ClientFollowupStatsQuery
{
    public function handle(): array
    {
        $counts = Client::query()
            ->whereIn('status', ['lead', 'prospect'])
            ->withCount(['followups' => fn (Builder $query) => $query->where('completed', true)])
            ->get()
            ->groupBy(fn (Client $client) => match (true) {
                $client->followups_count === 0 => 'never',
                $client->followups_count === 1 => 'first_contact',
                $client->followups_count === 2 => 'second_contact',
                default => 'exhausted',
            })
            ->map->count();

        return [
            'never' => $counts['never'] ?? 0,
            'first_contact' => $counts['first_contact'] ?? 0,
            'second_contact' => $counts['second_contact'] ?? 0,
            'exhausted' => $counts['exhausted'] ?? 0,
        ];
    }
}
