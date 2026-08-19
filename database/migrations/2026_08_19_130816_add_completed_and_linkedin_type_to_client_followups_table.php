<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('client_followups', function (Blueprint $table) {
            $table->boolean('completed')->default(true)->after('note');
        });

        DB::statement("ALTER TABLE client_followups MODIFY COLUMN type ENUM('call', 'email', 'whatsapp', 'linkedin', 'meeting', 'note') NOT NULL");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("ALTER TABLE client_followups MODIFY COLUMN type ENUM('call', 'email', 'whatsapp', 'meeting', 'note') NOT NULL");

        Schema::table('client_followups', function (Blueprint $table) {
            $table->dropColumn('completed');
        });
    }
};
