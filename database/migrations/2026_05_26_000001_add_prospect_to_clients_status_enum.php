<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // SQLite has no native ENUM type (values aren't constrained at the DB level
        // regardless), so this MySQL-specific DDL only applies there.
        if (DB::getDriverName() === 'mysql') {
            DB::statement("ALTER TABLE clients MODIFY COLUMN status ENUM('lead','prospect','active','archived') NOT NULL DEFAULT 'lead'");
        }
    }

    public function down(): void
    {
        DB::statement("UPDATE clients SET status = 'lead' WHERE status = 'prospect'");

        if (DB::getDriverName() === 'mysql') {
            DB::statement("ALTER TABLE clients MODIFY COLUMN status ENUM('lead','active','archived') NOT NULL DEFAULT 'lead'");
        }
    }
};
