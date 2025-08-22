<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('12345678'),
            'phone' => '123456789',
            'facebook_url' => 'https://facebook.com/user',
            'twitter_url' => 'https://twitter.com/user',
            'linkedin_url' => 'https://linkedin.com/in/user',
            'social_score' => 0,
            'mental_health_score' => 0,
            'psychological_health_score' => 0,
            'physical_health_score' => 0,
            'description' => 'Default system user',
        ]);
    }
}
