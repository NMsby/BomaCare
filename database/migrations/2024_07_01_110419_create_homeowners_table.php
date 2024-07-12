<?php

// database/migrations/2024_07_01_000000_create_homeowners_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeownersTable extends Migration
{
    public function up(): void
    {
        Schema::create('homeowners', function (Blueprint $table) {
            $table->id();
            $table->string('profile_picture');
            $table->string('name');
            $table->string('location');
            $table->integer('age');
            $table->string('gender');
            $table->string('phone_number');
            $table->string('id_number');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('homeowners');
    }
}
