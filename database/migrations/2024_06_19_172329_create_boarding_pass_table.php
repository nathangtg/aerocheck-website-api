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
        Schema::create('boarding_pass', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('passenger_id');
            $table->unsignedBigInteger('flight_id');
            $table->string('seat_number');
            $table->string('gate');
            $table->string('boarding_time');
            $table->string('departure_time');
            $table->enum('class', ['economy', 'business', 'first']);
            $table->enum('status', ['valid', 'invalid', 'expired']);

            $table->foreign('passenger_id')
                ->references('id')
                ->on('passengers');

            $table->foreign('flight_id')
                ->references('id')
                ->on('flights');

            $table->unique(['passenger_id', 'flight_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boarding_pass');
    }
};
