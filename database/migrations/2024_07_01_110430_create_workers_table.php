<?php

// database/migrations/2024_07_01_000000_create_workers_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkersTable extends Migration
{
    public function up(): void
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->string('profile_picture');
            $table->string('name');
            $table->string('phone_number');
            $table->string('specialty');
            $table->string('id_number');
            $table->integer('age');
            $table->string('certificate_of_good_conduct');
            $table->string('recommendation_letter');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('workers');
    }
}
