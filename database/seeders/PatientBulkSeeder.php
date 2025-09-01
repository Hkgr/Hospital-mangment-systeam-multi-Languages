<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class PatientBulkSeeder extends Seeder
{
    public function run()
    {
        $fakerAr = Faker::create('ar_SA');
        $bloodGroups = ['A+','A-','B+','B-','O+','O-','AB+','AB-'];

        for ($i = 1; $i <= 150; $i++) {
            $patient = new Patient();
            $patient->email = 'patient' . str_pad((string)$i, 3, '0', STR_PAD_LEFT) . '@example.com';
            $patient->password = Hash::make('password');
            $patient->Date_Birth = $fakerAr->date('Y-m-d', strtotime('-7 years')); // birthdate not younger than 7 years
            // رقم هاتف رقمي فقط يبدأ بـ 07 وطول 10 أرقام
            $patient->Phone = '07' . str_pad((string)$i, 8, '0', STR_PAD_LEFT);
            $patient->Gender = (string)random_int(1, 2); // 1 ذكر، 2 أنثى
            $patient->Blood_Group = $bloodGroups[array_rand($bloodGroups)];
            $patient->save();

            // الترجمات العربية للاسم والعنوان
            $patient->translateOrNew('ar')->name = $fakerAr->name;
            $patient->translateOrNew('ar')->Address = $fakerAr->address;
            // ترجمة إنجليزية اختيارية لتجنب الفراغ في الواجهة الإنجليزية
            $patient->translateOrNew('en')->name = 'Patient ' . $i;
            $patient->translateOrNew('en')->Address = 'Address ' . $i;
            $patient->save();
        }
    }
}

