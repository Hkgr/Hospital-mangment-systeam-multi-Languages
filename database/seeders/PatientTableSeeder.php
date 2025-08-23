<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PatientTableSeeder extends Seeder
{

    public function run()
    {
        $Patients = new Patient();
        $Patients->email = 'patient@yahoo.com';
        $Patients->password = Hash::make('12345678');
        $Patients->Date_Birth = '1988-12-01';
        $Patients->Phone = '123456789';
        $Patients->Gender = 1;
        $Patients->Blood_Group = 'A+';
        $Patients->facebook_url = 'https://facebook.com/patient';
        $Patients->twitter_url = 'https://twitter.com/patient';
        $Patients->linkedin_url = 'https://linkedin.com/in/patient';
        $Patients->social_score = 0;
        $Patients->mental_health_score = 0;
        $Patients->psychological_health_score = 0;
        $Patients->physical_health_score = 0;
        $Patients->description = 'Default patient user';       
        $Patients->save();

        //insert trans
        $Patients->name = 'محمد السيد';
        $Patients->Address = 'القاهرة';
        $Patients->save();
    }
}
