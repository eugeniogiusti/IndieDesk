<?php

namespace App\Queries\Security;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

/**
 * Query for the security monitoring page.
 *
 * Reads directly from the `sessions` table (database session driver) to
 * list who is currently logged in and from where.
 */
class ActiveSessionQuery
{
    const MAX_SESSIONS = 50;

    public function handle(): Collection
    {
        $expiresAt = now()->subMinutes(config('session.lifetime'))->getTimestamp();

        return DB::table('sessions')
            ->whereNotNull('user_id')
            ->where('last_activity', '>=', $expiresAt)
            ->orderByDesc('last_activity')
            ->limit(self::MAX_SESSIONS)
            ->get()
            ->map(fn ($session) => (object) [
                'id' => $session->id,
                'user_id' => $session->user_id,
                'ip_address' => $session->ip_address,
                'user_agent' => $session->user_agent,
                'is_current' => $session->id === session()->getId(),
                'last_activity' => \Illuminate\Support\Carbon::createFromTimestamp($session->last_activity),
            ]);
    }
}
