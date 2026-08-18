<?php

namespace App\Listeners\Security;

use App\Models\LoginLog;
use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;

class LogLogout
{
    public function __construct(
        private Request $request
    ) {}

    public function handle(Logout $event): void
    {
        if (! $event->user) {
            return;
        }

        LoginLog::create([
            'user_id' => $event->user->id,
            'event' => LoginLog::EVENT_LOGOUT,
            'email' => $event->user->email,
            'ip_address' => $this->request->ip(),
            'user_agent' => $this->request->userAgent(),
        ]);
    }
}
