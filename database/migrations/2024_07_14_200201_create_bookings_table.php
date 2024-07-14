<?php

use App\Models\Domesticworker;
use App\Models\ServiceType;
use App\Models\User;
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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignIDFor(User::class)->constrained();
            $table->foreignIdFor(Domesticworker::class)->constrained();
            $table->foreignIdFor(ServiceType::class)->constrained();
            $table->string('bookingDate');
            $table->string('bookingTime');
            $table->boolean('isAccepted')->default(false);
            $table->boolean('isRejected')->default(false);
            $table->boolean('isCompleted')->default(false);
            $table->json('origin')->nullable();
            $table->json('destination')->nullable();
            $table->string('destinationName')->nullable();
            $table->string('worker_location')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
