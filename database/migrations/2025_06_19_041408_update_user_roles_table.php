<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('user_roles', function (Blueprint $table) {
            if (!Schema::hasColumn('user_roles', 'user_id')) {
                $table->unsignedBigInteger('user_id')->comment('ID of the user');
            }
            if (!Schema::hasColumn('user_roles', 'role_id')) {
                $table->unsignedBigInteger('role_id')->comment('ID of the role');
            }
        });

        Schema::table('user_roles', function (Blueprint $table) {
            if (Schema::hasColumn('user_roles', 'user_id')) {
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            }
            if (Schema::hasColumn('user_roles', 'role_id')) {
                $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('user_roles', function (Blueprint $table) {
            if (Schema::hasColumn('user_roles', 'user_id')) {
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            }
            if (Schema::hasColumn('user_roles', 'role_id')) {
                $table->dropForeign(['role_id']);
                $table->dropColumn('role_id');
            }
        });
    }
};
