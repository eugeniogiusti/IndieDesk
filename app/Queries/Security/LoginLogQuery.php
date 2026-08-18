<?php

namespace App\Queries\Security;

use App\Models\LoginLog;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Query for the security monitoring page.
 *
 * Provides a paginated history of login/logout/failed-login/lockout events.
 */
class LoginLogQuery
{
    public function handle(): LengthAwarePaginator
    {
        return LoginLog::orderByDesc('created_at')->paginate(25);
    }
}
