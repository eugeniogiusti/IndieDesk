<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // SQLite has no native ENUM type, so this MySQL-specific DDL only applies there.
        if (DB::getDriverName() === 'mysql') {
            DB::statement("ALTER TABLE client_followups MODIFY COLUMN type ENUM('call', 'email', 'whatsapp', 'linkedin') NOT NULL");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (DB::getDriverName() === 'mysql') {
            DB::statement("ALTER TABLE client_followups MODIFY COLUMN type ENUM('call', 'email', 'whatsapp', 'linkedin', 'meeting', 'note') NOT NULL");
        }
    }
};
