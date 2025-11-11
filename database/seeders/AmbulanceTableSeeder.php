<?php

namespace Database\Seeders;

use App\Models\Ambulance;
use Illuminate\Database\Seeder;

class AmbulanceTableSeeder extends Seeder
{
    public function run()
    {
        $count = 10;
        for ($i = 1; $i <= $count; $i++) {
            $ambulance = new Ambulance();
            $ambulance->car_number = 'AMB-' . str_pad((string)$i, 3, '0', STR_PAD_LEFT);
            $ambulance->car_model = 'Model-' . rand(1, 5);
            $ambulance->car_year_made = (string)rand(2015, (int)date('Y'));
            $ambulance->driver_license_number = 'LIC-' . str_pad((string)$i, 5, '0', STR_PAD_LEFT);
            // digits-only phone number starting with 05 and length 10
            $ambulance->driver_phone = '05' . str_pad((string)random_int(0, 99999999), 8, '0', STR_PAD_LEFT);
            $ambulance->is_available = 1; // make available
            $ambulance->car_type = 1; // basic type
            $ambulance->save();

            // Arabic translation for driver name and notes
            $ambulance->translateOrNew('ar')->driver_name = 'سائق الإسعاف ' . $i;
            $ambulance->translateOrNew('ar')->notes = 'سيارة إسعاف مجهزة ومفعّلة للخدمة.';
            $ambulance->save();
        }
    }
}

