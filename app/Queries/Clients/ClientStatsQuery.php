<?php

namespace App\Queries\Clients;

use App\Models\Client;
use Illuminate\Support\Facades\DB;

/**
 * Client statistics for the index stat cards.
 *
 * Returns: total count and counts by status (active/archived).
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
            'total' => array_sum($byStatus),
            'active' => $byStatus['active'] ?? 0,
            'archived' => $byStatus['archived'] ?? 0,
        ];
    }
}