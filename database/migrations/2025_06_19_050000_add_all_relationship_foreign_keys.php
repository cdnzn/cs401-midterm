<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Add teacher_id to courses
        Schema::table('courses', function (Blueprint $table) {
            if (!Schema::hasColumn('courses', 'teacher_id')) {
                $table->unsignedBigInteger('teacher_id')->nullable()->after('id');
                $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('set null');
            }
        });

        // Add course_id to schedules
        Schema::table('schedules', function (Blueprint $table) {
            if (!Schema::hasColumn('schedules', 'course_id')) {
                $table->unsignedBigInteger('course_id')->nullable()->after('id');
                $table->foreign('course_id')->references('id')->on('courses')->onDelete('set null');
            }
        });

        // Add user_id to students
        Schema::table('students', function (Blueprint $table) {
            if (!Schema::hasColumn('students', 'user_id')) {
                $table->unsignedBigInteger('user_id')->nullable()->after('id');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            }
        });

        // Add user_id to teachers
        Schema::table('teachers', function (Blueprint $table) {
            if (!Schema::hasColumn('teachers', 'user_id')) {
                $table->unsignedBigInteger('user_id')->nullable()->after('id');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            }
        });

        // Add user_id and role_id to user_roles
        Schema::table('user_roles', function (Blueprint $table) {
            if (!Schema::hasColumn('user_roles', 'user_id')) {
                $table->unsignedBigInteger('user_id')->nullable()->after('id');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            }
            if (!Schema::hasColumn('user_roles', 'role_id')) {
                $table->unsignedBigInteger('role_id')->nullable()->after('user_id');
                $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            }
        });
    }

    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            if (Schema::hasColumn('courses', 'teacher_id')) {
                $table->dropForeign(['teacher_id']);
                $table->dropColumn('teacher_id');
            }
        });
        Schema::table('schedules', function (Blueprint $table) {
            if (Schema::hasColumn('schedules', 'course_id')) {
                $table->dropForeign(['course_id']);
                $table->dropColumn('course_id');
            }
        });
        Schema::table('students', function (Blueprint $table) {
            if (Schema::hasColumn('students', 'user_id')) {
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            }
        });
        Schema::table('teachers', function (Blueprint $table) {
            if (Schema::hasColumn('teachers', 'user_id')) {
                $table->dropForeign(['user_id']);
                $table->dropColumn('user_id');
            }
        });
        Schema::table('user_roles', function (Blueprint $table) {
            if (Schema::hasColumn('user_roles', 'user_id')) {
                $table->dropForeign(['user_id']);
            }
            if (Schema::hasColumn('user_roles', 'role_id')) {
                $table->dropForeign(['role_id']);
            }
            if (Schema::hasColumn('user_roles', 'user_id') && Schema::hasColumn('user_roles', 'role_id')) {
                $table->dropColumn(['user_id', 'role_id']);
            } elseif (Schema::hasColumn('user_roles', 'user_id')) {
                $table->dropColumn('user_id');
            } elseif (Schema::hasColumn('user_roles', 'role_id')) {
                $table->dropColumn('role_id');
            }
        });
    }
};
