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
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('airline_id');
            $table->string('flight_number');
            $table->unique(['airline_id', 'flight_number']);

            $table->string('departure_airport');
            $table->foreign('departure_airport')
                ->references('iata')
                ->on('airports');

            $table->string('arrival_airport');
            $table->foreign('arrival_airport')
                ->references('iata')
                ->on('airports');

            $table->dateTime('departure_time');
            $table->dateTime('arrival_time');
            $table->enum('status', ['scheduled', 'delayed', 'cancelled', 'departed', 'arrived', 'diverted']);

            $table->foreign('airline_id')
                ->references('id')
                ->on('airlines');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
