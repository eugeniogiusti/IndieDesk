<?php

namespace App\Queries\Clients;

use App\Models\Client;
use Illuminate\Support\Facades\DB;

/**
 * Client statistics for the index stat cards.
 *
 * Returns: total count, counts by status (lead/active/archived),
 * new this month, converted this month, lead/archived percentages.
 */
class ClientStatsQuery
{
    public function handle(): array
    {
        // Clients by status
        $byStatus = Client::select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();

        return [
            'total' => $byStatus['active'] ?? 0,
            'lead' => $byStatus['lead'] ?? 0,
            'prospect' => $byStatus['prospect'] ?? 0,
            'active' => $byStatus['active'] ?? 0,
            'archived' => $byStatus['archived'] ?? 0,
        ];
    }
}