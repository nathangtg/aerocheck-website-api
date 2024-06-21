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
        Schema::create('check_in_counters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('airport_id');
            $table->unsignedBigInteger('staff_id');
            $table->unsignedBigInteger('flight_id');
            $table->integer('counter_number');

            $table->foreign('staff_id')
                ->references('id')
                ->on('staff');

            $table->foreign('flight_id')
                ->references('id')
                ->on('flights');

            $table->foreign('airport_id')
                ->references('id')
                ->on('airports');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('check_in_counters');
    }
};
