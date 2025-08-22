<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            // نحذف القيد إن وُجد
            try {
                $table->dropForeign(['patient_id']);
            } catch (\Throwable $e) {
                // تجاهل الخطأ إذا لم يكن موجودًا
            }
        });

        // نحذف العمود فقط إذا كان موجودًا
        if (Schema::hasColumn('appointments', 'patient_id')) {
            Schema::table('appointments', function (Blueprint $table) {
                $table->dropColumn('patient_id');
            });
        }

        // ثم نعيد إنشاءه كـ nullable مع القيد الصحيح
        Schema::table('appointments', function (Blueprint $table) {
            $table->foreignId('patient_id')
                  ->nullable()
                  ->constrained('patients')
                  ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropForeign(['patient_id']);
            $table->dropColumn('patient_id');
        });
    }
};
