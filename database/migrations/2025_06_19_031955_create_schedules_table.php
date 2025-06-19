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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('day_of_week', 10)->comment('day of the week for the schedule.');
            $table->dateTime('time_slot')->comment('time slot for the schedule.');
            $table->string('room', 20)->comment('room where the class is held.');
            $table->integer('term')->comment('term in which the class is scheduled.');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
