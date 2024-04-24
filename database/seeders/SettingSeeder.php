<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->insert([
            'address' => '123 Main Street',
            'email' => 'info@example.com',
            'phone' => '1234567890',
            'facebook' => 'https://facebook.com/example',
            'youtube' => 'https://youtube.com/example',
            'telegram' => 'https://t.me/example',
            'about_us' => 'نبذة عن الموقع',
            'deposit_phone' => '0987654321',
            'subscription_fee' => '2000',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
