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
        Schema::create('tax_fund_movements', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            // Signed: positive = deposit into the tax fund account, negative = withdrawal.
            $table->decimal('amount', 10, 2);
            $table->string('notes')->nullable();
            $table->timestamps();

            $table->index('date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tax_fund_movements');
    }
};
