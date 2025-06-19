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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 255)->comment('student first name.');
            $table->string('last_name', 255)->comment('student last name.');
            $table->string('program', 255)->comment('student program.');
            $table->string('enrollment_year', 4)->comment('year student enrolled in.');
            $table->dateTime('birthday')->comment('student birthday.');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void 
    {
        Schema::dropIfExists('students');
    }   
};
