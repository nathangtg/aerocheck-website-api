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
            // Adding the new column 'group_id' with a default value of null
            $table->unsignedBigInteger('group_id')->nullable()->default(null)->after('id');

            $table->foreign('group_id')
                ->references('id')
                ->on('groups')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('passengers', function (Blueprint $table) {
            // Dropping the 'group_id' column
            $table->dropColumn('group_id');

            // If you set up a foreign key constraint, uncomment the line below
            // $table->dropForeign(['group_id']);
        });
    }
};
