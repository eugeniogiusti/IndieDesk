<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoogleCalendarSettings extends Model
{
    protected $table = 'google_calendar_settings';

    protected $fillable = [
        'access_token',
        'refresh_token',
        'expires_at',
        'email',
    ];

    protected $casts = [
        'access_token' => 'encrypted',
        'refresh_token' => 'encrypted',
        'expires_at' => 'datetime',
    ];

    /**
     * Cached singleton instance (one query per request)
     */
    protected static ?self $cachedInstance = null;

    /**
     * Get the singleton instance
     */
    public static function current(): self
    {
        return static::$cachedInstance ??= static::firstOrCreate(['id' => 1]);
    }

    public function isConnected(): bool
    {
        return !empty($this->refresh_token);
    }

    public function disconnect(): void
    {
        $this->update([
            'access_token' => null,
            'refresh_token' => null,
            'expires_at' => null,
            'email' => null,
        ]);
    }
}
