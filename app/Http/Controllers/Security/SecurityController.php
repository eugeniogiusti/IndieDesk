<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use App\Queries\Security\ActiveSessionQuery;
use App\Queries\Security\LoginLogQuery;

class SecurityController extends Controller
{
    public function index(LoginLogQuery $loginLogQuery, ActiveSessionQuery $activeSessionQuery)
    {
        $logs = $loginLogQuery->handle();
        $sessions = $activeSessionQuery->handle();

        return view('security.index', compact('logs', 'sessions'));
    }
}
