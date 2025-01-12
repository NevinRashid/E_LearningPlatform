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
    {if (!Schema::hasColumn('users', 'deleted_at')) 
        Schema::table('users', function (Blueprint $table) {
            $table->softDeletes();
        });
        if (!Schema::hasColumn('password_reset_tokens', 'deleted_at')){
        Schema::table('password_reset_tokens', function (Blueprint $table) {
            $table->softDeletes();
        });}
        if (!Schema::hasColumn('password_resets', 'deleted_at')){
        Schema::table('password_resets', function (Blueprint $table) {
            $table->softDeletes();
        });}
        if (!Schema::hasColumn('failed_jobs', 'deleted_at')) {
        Schema::table('failed_jobs', function (Blueprint $table) {
            $table->softDeletes();
        });}
        if (!Schema::hasColumn('personal_access_tokens', 'deleted_at')) {
        Schema::table('personal_access_tokens', function (Blueprint $table) {
            $table->softDeletes();
        });}
        if (!Schema::hasColumn('categories', 'deleted_at')) {
        Schema::table('categories', function (Blueprint $table) {
            $table->softDeletes();
        });}
        if (!Schema::hasColumn('courses', 'deleted_at')) {
        Schema::table('courses', function (Blueprint $table) {
            $table->softDeletes();
        });}
        if (!Schema::hasColumn('comments', 'deleted_at')) {
        Schema::table('comments', function (Blueprint $table) {
            $table->softDeletes();
        });}
        if (!Schema::hasColumn('ratings', 'deleted_at')) {
        Schema::table('ratings', function (Blueprint $table) {
            $table->softDeletes();
        });}
        if (!Schema::hasColumn('files', 'deleted_at')) {
        Schema::table('files', function (Blueprint $table) {
            $table->softDeletes();
        });}
        if (!Schema::hasColumn('course_user', 'deleted_at')) {
        Schema::table('course_user', function (Blueprint $table) {
            $table->softDeletes();
        });}
       

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropSoftDeletes(); 
        });
        Schema::table('password_reset_tokens', function (Blueprint $table) {
            $table->dropSoftDeletes();  
        });
        Schema::table('password_resets', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('failed_jobs', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('personal_access_tokens', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('categories', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('courses', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('comments', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('ratings', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('files', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('course_user', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('permission', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });


    }
};
