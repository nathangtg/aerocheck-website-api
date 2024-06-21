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
        Schema::table('passengers', function (Blueprint $table) {
            $table->boolean('special_needs')->default(false)->after('flight_id');
            $table->text('special_needs_description')->nullable()->after('special_needs');
            $table->boolean('is_checked_in')->default(false)->after('special_needs_description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('passengers', function (Blueprint $table) {
            $table->dropColumn('special_needs');
            $table->dropColumn('special_needs_description');
            $table->dropColumn('is_checked_in');
        });
    }
};
