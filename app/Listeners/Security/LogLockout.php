<?php

namespace App\Listeners\Security;

use App\Models\LoginLog;
// use App\Models\User;
// use App\Notifications\Security\AccountLockoutAlert;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Carbon;
// use Illuminate\Support\Facades\Notification;

class LogLockout
{
    public function handle(Lockout $event): void
    {
        $attemptedEmail = $event->request->input('email');
        $ipAddress = $event->request->ip();
        $occurredAt = Carbon::now();

        LoginLog::create([
            'event' => LoginLog::EVENT_LOCKOUT,
            'email' => $attemptedEmail,
            'ip_address' => $ipAddress,
            'user_agent' => $event->request->userAgent(),
        ]);

        // Email alert disabled until server mail configuration is verified.
        // Notification::send(
        //     User::all(),
        //     new AccountLockoutAlert($attemptedEmail, $ipAddress, $occurredAt)
        // );
    }
}
