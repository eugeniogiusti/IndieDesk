<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tax_fund_movements', function (Blueprint $table) {
            // Set when this movement was auto-generated from a Tax being
            // marked paid, so it can be kept in sync (or removed) if that
            // tax is edited or deleted.
            $table->foreignId('tax_id')->nullable()->after('id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tax_fund_movements', function (Blueprint $table) {
            $table->dropConstrainedForeignId('tax_id');
        });
    }
};
