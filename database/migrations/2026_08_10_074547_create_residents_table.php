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
    Schema::create('residents', function (Blueprint $table) {
        $table->id();

        $table->string('name');
        $table->string('email')->unique();
        $table->string('phone');
        $table->string('cnic')->unique();
        $table->string('guardian_name');
        $table->string('guardian_phone');

        $table->foreignId('room_id')
              ->nullable()
              ->constrained('rooms')
              ->nullOnDelete();

        $table->date('check_in_date');
        $table->decimal('monthly_fee', 10, 2);

        $table->enum('status', ['active', 'left'])
              ->default('active');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
   public function down(): void
{
    Schema::dropIfExists('residents');
}
};
