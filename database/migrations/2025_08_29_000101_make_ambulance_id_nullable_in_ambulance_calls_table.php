<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Make `ambulance_id` nullable to allow creating calls when no ambulance is available
        DB::statement('ALTER TABLE `ambulance_calls` MODIFY `ambulance_id` BIGINT UNSIGNED NULL');
    }

    public function down(): void
    {
        // Revert to NOT NULL (will fail if NULLs exist)
        DB::statement('ALTER TABLE `ambulance_calls` MODIFY `ambulance_id` BIGINT UNSIGNED NOT NULL');
    }
};

