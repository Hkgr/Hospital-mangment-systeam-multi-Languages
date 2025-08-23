<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDescriptionToUserTables extends Migration
{
    public function up()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->text('description')->nullable();
        });

        Schema::table('doctors', function (Blueprint $table) {
            $table->text('description')->nullable();
        });

        Schema::table('patients', function (Blueprint $table) {
            $table->text('description')->nullable();
        });

        Schema::table('laboratorie_employees', function (Blueprint $table) {
            $table->text('description')->nullable();
        });

        Schema::table('ray_employees', function (Blueprint $table) {
            $table->text('description')->nullable();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->text('description')->nullable();
        });
    }

    public function down()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->dropColumn('description');
        });

        Schema::table('doctors', function (Blueprint $table) {
            $table->dropColumn('description');
        });

        Schema::table('patients', function (Blueprint $table) {
            $table->dropColumn('description');
        });

        Schema::table('laboratorie_employees', function (Blueprint $table) {
            $table->dropColumn('description');
        });

        Schema::table('ray_employees', function (Blueprint $table) {
            $table->dropColumn('description');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('description');
        });
    }
}