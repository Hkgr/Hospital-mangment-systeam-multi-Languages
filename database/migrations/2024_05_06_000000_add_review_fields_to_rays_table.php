<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('rays', function (Blueprint $table) {
            $table->dateTime('review_date')->nullable()->after('case');
            $table->boolean('needs_review')->default(false)->after('review_date');
        });
    }

    public function down(): void
    {
        Schema::table('rays', function (Blueprint $table) {
            $table->dropColumn(['review_date', 'needs_review']);
        });
    }
};