<?php

namespace App\Listeners\Security;

use App\Models\LoginLog;
use Illuminate\Auth\Events\Failed;
use Illuminate\Http\Request;

class LogFailedLogin
{
    public function __construct(
        private Request $request
    ) {}

    public function handle(Failed $event): void
    {
        LoginLog::create([
            'user_id' => $event->user?->id,
            'event' => LoginLog::EVENT_LOGIN_FAILED,
            'email' => $event->credentials['email'] ?? $event->user?->email,
            'ip_address' => $this->request->ip(),
            'user_agent' => $this->request->userAgent(),
        ]);
    }
}
