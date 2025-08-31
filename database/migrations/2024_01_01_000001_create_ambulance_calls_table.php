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
        Schema::create('ambulance_calls', function (Blueprint $table) {
            $table->id();
            $table->string('phone');
            $table->timestamp('call_time');
            $table->foreignId('ambulance_id')->constrained('ambulances')->cascadeOnDelete();
            $table->string('address');
            $table->enum('status', ['first_aid', 'transfer_to_hospital', 'transfer_to_another_hospital', 'unknown'])->default('unknown');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ambulance_calls');
    }
};