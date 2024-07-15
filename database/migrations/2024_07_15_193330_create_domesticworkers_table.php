<?php

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
        Schema::create('domesticworkers', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(model: User::class);
            $table->integer('national_id');
            $table->string('national_id_photo');
            $table->string('certificate_of_good_conduct');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domesticworkers');
    }
};
