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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('subject', 50)->comment('name of the subject.');
            $table->string('course_code', 10)->unique()->comment('unique code for the course.');
            $table->integer('credits')->nullable()->comment('number of credits for the course.');
            $table->string('description', 255)->comment('brief description of the course.');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
