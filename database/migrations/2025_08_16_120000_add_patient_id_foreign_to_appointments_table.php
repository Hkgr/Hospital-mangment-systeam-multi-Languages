<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // نتأكد وجود العمود أولًا
        if (Schema::hasColumn('appointments', 'patient_id')) {
            Schema::table('appointments', function (Blueprint $table) {
                // اختر أحد السلوكين حسب ما تريد:

                // 1) لو تحب "NULL عند حذف المريض" (آمن مع بيانات موجودة):
                $table->foreign('patient_id')
                      ->references('id')->on('patients')
                      ->nullOnDelete();

                // 2) لو تفضّل الحذف التلقائي للمواعيد عند حذف المريض (cascade):
                // تأكد أن كل السجلات الحالية سليمة قبل ذلك!
                // $table->dropForeign(['patient_id']); // لو كان فيه قيد سابق
                // $table->foreign('patient_id')
                //       ->references('id')->on('patients')
                //       ->cascadeOnDelete();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('appointments', 'patient_id')) {
            Schema::table('appointments', function (Blueprint $table) {
                $table->dropForeign(['patient_id']);
            });
        }
    }
};
