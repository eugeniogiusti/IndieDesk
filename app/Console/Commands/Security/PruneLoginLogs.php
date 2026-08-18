<?php

namespace App\Console\Commands\Security;

use App\Models\LoginLog;
use Illuminate\Console\Command;

class PruneLoginLogs extends Command
{
    const RETENTION_MONTHS = 12;

    protected $signature = 'security:prune-login-logs';

    protected $description = 'Delete login log entries older than the retention window';

    public function handle(): void
    {
        $deleted = LoginLog::where('created_at', '<', now()->subMonths(self::RETENTION_MONTHS))->delete();

        $this->info("Deleted {$deleted} login log entries older than " . self::RETENTION_MONTHS . ' months.');
    }
}
