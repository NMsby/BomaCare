<?php

use App\Models\Booking;
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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['started', 'completed', 'cancelled'])->default('started');
            $table->foreignIdFor(model: Booking::class);
            $table->dateTime('appointment_date');
            $table->dateTime('appointment_time');
            $table->string('appointment_destination');
            $table->string('appointment_note');
            $table->string('appointment_feedback');
            $table->string('appointment_rating');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
