<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ArabicDoctorSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('ar_SA');
        $sectionIds = [1, 2, 4, 5, 7];

        // Create 60 Arabic-named doctors; phone digits-only; random section assignment
        for ($i = 1; $i <= 60; $i++) {
            $arabicName = $faker->name;
            // Digits-only 10-digit local-style number starting with 05
            $phone = '05' . str_pad((string)random_int(0, 99999999), 8, '0', STR_PAD_LEFT);

            $doctor = new Doctor();
            $doctor->email = 'doctor_ar_' . str_pad((string)$i, 3, '0', STR_PAD_LEFT) . '@example.com';
            $doctor->password = bcrypt('password');
            $doctor->phone = $phone; // digits only
            $doctor->section_id = $faker->randomElement($sectionIds);
            $doctor->status = 1;
            $doctor->save();

            // Arabic name translation
            $doctor->translateOrNew('ar')->name = $arabicName;
            // Optional: simple Latin placeholder for EN to avoid null translation
            $doctor->translateOrNew('en')->name = 'Dr. ' . $i;
            $doctor->save();
        }
    }
}
