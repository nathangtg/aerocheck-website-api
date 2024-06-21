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
        Schema::create('airports', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string(('city'));
            $table->string('country');
            $table->string('iata', 3)->unique();
            $table->string('icao', 4)->unique();
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->integer('altitude');
            $table->decimal('timezone', 4, 2);
            $table->string('dst', 1);
            $table->string('tz_database_time_zone');
            $table->enum('type', ['airport', 'station']);
            $table->string('source');
            $table->string('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('airports');
    }
};
