<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoginLog extends Model
{
    const EVENT_LOGIN_SUCCESS = 'login_success';
    const EVENT_LOGIN_FAILED = 'login_failed';
    const EVENT_LOGOUT = 'logout';
    const EVENT_LOCKOUT = 'lockout';

    const UPDATED_AT = null;

    protected $fillable = [
        'user_id',
        'event',
        'email',
        'ip_address',
        'user_agent',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getBadgeClassesAttribute(): string
    {
        return match ($this->event) {
            self::EVENT_LOGIN_SUCCESS => 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400',
            self::EVENT_LOGIN_FAILED => 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400',
            self::EVENT_LOCKOUT => 'bg-orange-100 text-orange-800 dark:bg-orange-900/30 dark:text-orange-400',
            default => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300',
        };
    }
}
