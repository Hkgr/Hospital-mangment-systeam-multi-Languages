<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ambulance_calls', function (Blueprint $table) {
            if (!Schema::hasColumn('ambulance_calls', 'details')) {
                $table->text('details')->nullable()->after('address');
            }
        });
    }

    public function down(): void
    {
        Schema::table('ambulance_calls', function (Blueprint $table) {
            if (Schema::hasColumn('ambulance_calls', 'details')) {
                $table->dropColumn('details');
            }
        });
    }
};

