<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSocialAndHealthFieldsToUsersTables extends Migration
{
    public function up()
    {
        $tables = [
            'users',
            'admins',
            'doctors',
            'patients',
            'laboratorie_employees',
            'ray_employees',
        ];

        foreach ($tables as $tableName) {
            Schema::table($tableName, function (Blueprint $table) use ($tableName) {
                if (!Schema::hasColumn($tableName, 'facebook_url')) {
                    $table->string('facebook_url')->nullable();
                }
                if (!Schema::hasColumn($tableName, 'twitter_url')) {
                    $table->string('twitter_url')->nullable();
                }
                if (!Schema::hasColumn($tableName, 'linkedin_url')) {
                    $table->string('linkedin_url')->nullable();
                }
                if (!Schema::hasColumn($tableName, 'phone')) {
                    $table->string('phone')->nullable();
                }
                if (!Schema::hasColumn($tableName, 'social_score')) {
                    $table->integer('social_score')->nullable()->default(0);
                }
                if (!Schema::hasColumn($tableName, 'mental_health_score')) {
                    $table->integer('mental_health_score')->nullable()->default(0);
                }
                if (!Schema::hasColumn($tableName, 'psychological_health_score')) {
                    $table->integer('psychological_health_score')->nullable()->default(0);
                }
                if (!Schema::hasColumn($tableName, 'physical_health_score')) {
                    $table->integer('physical_health_score')->nullable()->default(0);
                }
            });
        }
    }

    public function down()
    {
        $tables = [
            'users',
            'admins',
            'doctors',
            'patients',
            'laboratorie_employees',
            'ray_employees',
        ];

        foreach ($tables as $tableName) {
            Schema::table($tableName, function (Blueprint $table) {
                $table->dropColumn([
                    'facebook_url',
                    'twitter_url',
                    'linkedin_url',
                    'phone',
                    'social_score',
                    'mental_health_score',
                    'psychological_health_score',
                    'physical_health_score',
                ]);
            });
        }
    }
}
