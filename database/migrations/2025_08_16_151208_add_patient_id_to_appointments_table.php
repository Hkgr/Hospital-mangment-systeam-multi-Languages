<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('appointments', 'patient_id')) {
            Schema::table('appointments', function (Blueprint $table) {
                $table->foreignId('patient_id')
                      ->after('section_id')
                      ->constrained('patients')
                      ->cascadeOnDelete();
            });
        } else {
            Schema::table('appointments', function (Blueprint $table) {
                $table->foreign('patient_id')
                      ->references('id')->on('patients')
                      ->cascadeOnDelete();
            });
        }
    }

    public function down(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropForeign(['patient_id']);
            // احذف العمود فقط إذا كنت قد أنشأته في up (الخيار الأول لا ينشئه)
            // $table->dropColumn('patient_id');
        });
    }
};
