<?php

namespace Database\Seeders;

use App\Models\RayEmployee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class RayEmployeeTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('ar_SA');

        for ($i = 1; $i <= 10; $i++) {
            $ray_employee = new RayEmployee();
            $ray_employee->name = $faker->name;
            $ray_employee->email = 'ray' . str_pad((string)$i, 2, '0', STR_PAD_LEFT) . '@example.com';
            $ray_employee->password = Hash::make('password');
            // رقم هاتف بصيغة أرقام فقط يبدأ بـ 05 بطول 10 أرقام
            $ray_employee->phone = '05' . str_pad((string)random_int(0, 99999999), 8, '0', STR_PAD_LEFT);
            $ray_employee->facebook_url = 'https://facebook.com/rayemployee' . $i;
            $ray_employee->twitter_url = 'https://twitter.com/rayemployee' . $i;
            $ray_employee->linkedin_url = 'https://linkedin.com/in/rayemployee' . $i;
            $ray_employee->social_score = 0;
            $ray_employee->mental_health_score = 0;
            $ray_employee->psychological_health_score = 0;
            $ray_employee->physical_health_score = 0;
            $ray_employee->description = 'Ray employee seeded #' . $i;
            $ray_employee->save();
        }
    }
}

