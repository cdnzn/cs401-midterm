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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 255)->comment('user first name.');
            $table->string('last_name', 255)->comment('user last name.');
            $table->string('user_name', 30)->comment('user user name.')->max(30);
            $table->string('password', 255)->comment('user password.');
            $table->timestamp('registration_date')->comment('user date of registration.');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
