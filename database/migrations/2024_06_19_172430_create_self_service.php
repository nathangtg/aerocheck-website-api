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
        Schema::create('self_service', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('airport_id');
            $table->unsignedBigInteger('passenger_id');
            $table->unsignedBigInteger('flight_id');
            $table->enum('status', ['pending', 'completed', 'cancelled']);

            $table->foreign('airport_id')
                ->references('id')
                ->on('airports');

            $table->foreign('passenger_id')
                ->references('id')
                ->on('passengers');

            $table->foreign('flight_id')
                ->references('id')
                ->on('flights');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('self_service');
    }
};
