<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Clients now only hold actual customers (active/archived). Lead and
 * prospect tracking moves to the dedicated Acquisition module, so existing
 * lead/prospect records and their follow-ups are dropped (test data only).
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::dropIfExists('client_followups');

        // Hard delete, soft-deleted rows included. Related FKs are
        // cascade (client_project) or set null (projects, payments).
        DB::table('clients')->whereIn('status', ['lead', 'prospect'])->delete();

        // SQLite has no native ENUM type, so this MySQL-specific DDL only applies there.
        if (DB::getDriverName() === 'mysql') {
            DB::statement("ALTER TABLE clients MODIFY COLUMN status ENUM('active','archived') NOT NULL DEFAULT 'active'");
        }
    }

    /**
     * Reverse the migrations (schema only, deleted data is not restored).
     */
    public function down(): void
    {
        if (DB::getDriverName() === 'mysql') {
            DB::statement("ALTER TABLE clients MODIFY COLUMN status ENUM('lead','prospect','active','archived') NOT NULL DEFAULT 'lead'");
        }

        Schema::create('client_followups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained()->cascadeOnDelete();
            $table->enum('type', ['call', 'email', 'whatsapp', 'linkedin']);
            $table->text('note')->nullable();
            $table->boolean('completed')->default(true);
            $table->date('contacted_at');
            $table->string('google_event_id')->nullable();
            $table->timestamps();
        });
    }
};
