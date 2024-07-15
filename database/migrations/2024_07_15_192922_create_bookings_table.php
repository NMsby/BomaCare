<?php

use App\Models\Domesticworker;
use App\Models\Homeowner;
use App\Models\ServiceType;
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
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->foreignIdFor(ServiceType::class);
            $table->foreignIdFor(Homeowner::class);
            $table->foreignIdFor(Domesticworker::class);
            $table->string('booking_destination');
            $table->dateTime('booking_date');
            $table->dateTime('booking_time');
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
