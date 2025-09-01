<?php

namespace Database\Seeders;

use App\Models\LaboratorieEmployee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class LaboratorieEmployeeTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('ar_SA');

        for ($i = 1; $i <= 10; $i++) {
            $emp = new LaboratorieEmployee();
            $emp->name = $faker->name;
            $emp->email = 'lab' . str_pad((string)$i, 2, '0', STR_PAD_LEFT) . '@example.com';
            $emp->password = Hash::make('password');
            $emp->phone = '05' . str_pad((string)random_int(0, 99999999), 8, '0', STR_PAD_LEFT);
            $emp->facebook_url = 'https://facebook.com/labemployee' . $i;
            $emp->twitter_url = 'https://twitter.com/labemployee' . $i;
            $emp->linkedin_url = 'https://linkedin.com/in/labemployee' . $i;
            $emp->social_score = random_int(1, 100);
            $emp->mental_health_score =  random_int(1, 100);;
            $emp->psychological_health_score =  random_int(1, 100);;
            $emp->physical_health_score =  random_int(1, 100);;
            $emp->description = 'Laboratory employee seeded #' . $i;
            $emp->save();
        }
    }
}

