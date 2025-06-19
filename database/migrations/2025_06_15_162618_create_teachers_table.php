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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 255)->comment('teacher first name.');
            $table->string('last_name', 255)->comment('teacher last name.');
            $table->string('email', 50)->unique()->comment('teacher email address.');
            $table->string('department', 10)->comment('teacher department.');
            $table->dateTime('birthday')->comment('teacher birthday.');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void 
    {
        Schema::dropIfExists('teachers');
    }
};
