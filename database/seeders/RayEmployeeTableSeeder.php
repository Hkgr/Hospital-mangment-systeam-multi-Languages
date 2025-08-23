<?php

namespace Database\Seeders;

use App\Models\RayEmployee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RayEmployeeTableSeeder extends Seeder
{

    public function run()
    {
        $ray_employee = new RayEmployee();
        $ray_employee->name = 'محمد السيد';
        $ray_employee->email = 'm@yahoo.com';
        $ray_employee->password = Hash::make('12345678');
        $ray_employee->phone = '123456789';
        $ray_employee->facebook_url = 'https://facebook.com/rayemployee';
        $ray_employee->twitter_url = 'https://twitter.com/rayemployee';
        $ray_employee->linkedin_url = 'https://linkedin.com/in/rayemployee';
        $ray_employee->social_score = 0;
        $ray_employee->mental_health_score = 0;
        $ray_employee->psychological_health_score = 0;
        $ray_employee->physical_health_score = 0;
        $ray_employee->description = 'Default ray employee';
        $ray_employee->save();
    }
}
