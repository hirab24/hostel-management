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
    Schema::create('payments', function (Blueprint $table) {
        $table->id();

        $table->foreignId('resident_id')
              ->constrained('residents')
              ->cascadeOnDelete();

        $table->decimal('amount', 10, 2);

        $table->string('month');

        $table->date('payment_date')->nullable();

        $table->enum('payment_method', [
            'cash',
            'bank_transfer',
            'online'
        ])->nullable();

        $table->enum('status', [
            'paid',
            'pending'
        ])->default('pending');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::dropIfExists('payments');
}
};
