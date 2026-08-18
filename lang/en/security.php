<?php

return [

    'title' => 'Security',
    'subtitle' => 'Login history and active sessions for your account.',

    'active_sessions' => [
        'title' => 'Active Sessions',
        'ip' => 'IP Address',
        'device' => 'Device',
        'last_activity' => 'Last Activity',
        'current_badge' => 'This device',
        'empty' => 'No active sessions.',
    ],

    'login_history' => [
        'title' => 'Login History',
        'event' => 'Event',
        'email' => 'Email',
        'ip' => 'IP Address',
        'device' => 'Device',
        'date' => 'Date',
        'empty' => 'No events recorded yet.',
    ],

    'events' => [
        'login_success' => 'Login',
        'login_failed' => 'Failed login',
        'logout' => 'Logout',
        'lockout' => 'Lockout',
    ],

    'lockout_alert' => [
        'subject' => 'Security alert: account locked after repeated failed logins',
        'intro' => 'Your account was temporarily locked after too many failed login attempts.',
        'attempted_email' => 'Email used: :email',
        'ip' => 'IP address: :ip',
        'date' => 'Date: :date',
        'outro' => 'If this was not you, consider changing your password.',
        'action' => 'View security page',
    ],

];
