<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('costs', function (Blueprint $table) {
            $table->dropIndex(['type', 'recurring']);
            $table->dropColumn(['recurring', 'recurring_period']);
        });
    }

    public function down(): void
    {
        Schema::table('costs', function (Blueprint $table) {
            $table->boolean('recurring')->default(false)->after('type');
            $table->string('recurring_period')->nullable()->after('recurring');
            $table->index(['type', 'recurring']);
        });
    }
};
