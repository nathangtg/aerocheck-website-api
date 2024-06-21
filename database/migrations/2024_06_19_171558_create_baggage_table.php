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
        Schema::create('baggage', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('passenger_id');
            $table->unsignedBigInteger('flight_id');
            $table->string('tag_number');
            $table->string('weight');
            $table->enum('status', ['checked', 'unchecked']);
            $table->timestamps();

            $table->foreign('passenger_id')
                ->references('id')
                ->on('passengers');

            $table->foreign('flight_id')
                ->references('id')
                ->on('flights');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baggage');
    }
};
