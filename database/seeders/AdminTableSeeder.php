<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();
        DB::table('admins')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'phone' => '123456789',
            'facebook_url' => 'https://facebook.com/admin',
            'twitter_url' => 'https://twitter.com/admin',
            'linkedin_url' => 'https://linkedin.com/in/admin',
            'social_score' => 60,
            'mental_health_score' => 70,
            'psychological_health_score' => 90,
            'physical_health_score' => 100,
            'description' => 'Default admin user',
        ]);
    }
}
