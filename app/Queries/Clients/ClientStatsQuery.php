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
        // Total = active + archived (leads excluded — not yet converted)
        $total = Client::whereIn('status', ['active', 'archived'])->count();

        // Clients by status
        $byStatus = Client::select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();

        // New clients this month
        $newThisMonth = Client::whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month)
            ->count();

        // Converted clients this month (lead to active)
        $convertedThisMonth = Client::where('status', 'active')
            ->whereYear('updated_at', now()->year)
            ->whereMonth('updated_at', now()->month)
            ->count();

        return [
            'total' => $total,
            'lead' => $byStatus['lead'] ?? 0,
            'prospect' => $byStatus['prospect'] ?? 0,
            'active' => $byStatus['active'] ?? 0,
            'archived' => $byStatus['archived'] ?? 0,
            'new_this_month' => $newThisMonth,
            'converted_this_month' => $convertedThisMonth,
            'lead_percentage' => $total > 0 ? round(($byStatus['lead'] ?? 0) / $total * 100) : 0,
            'archived_percentage' => $total > 0 ? round(($byStatus['archived'] ?? 0) / $total * 100) : 0,
        ];
    }
}