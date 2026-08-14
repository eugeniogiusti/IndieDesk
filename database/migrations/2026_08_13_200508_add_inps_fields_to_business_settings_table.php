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
        Schema::table('business_settings', function (Blueprint $table) {
            $table->decimal('inps_rate', 5, 2)->nullable()->after('annual_revenue_cap');
            $table->decimal('inps_ceiling', 12, 2)->nullable()->after('inps_rate');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('business_settings', function (Blueprint $table) {
            $table->dropColumn(['inps_rate', 'inps_ceiling']);
        });
    }
};
