<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceTranslationsTable extends Migration
{
    public function up()
    {
        Schema::create('service_translations', function (Blueprint $table) {
            $table->id();
            $table->string('locale', 5)->index(); // طول 5 أحرف كافٍ للرموز مثل en/ar
            $table->string('name', 191); // تحديد الطول صراحةً
            $table->foreignId('service_id')->constrained()->onDelete('cascade');
            $table->unique(['service_id', 'locale', 'name']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('service_translations');
    }
}