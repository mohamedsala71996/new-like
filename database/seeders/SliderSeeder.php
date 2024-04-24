<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sliders')->insert([
            [
                "photo" => 'bankpayment.jpg',
                'url' => 'https://www.google.com/',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                "photo" => 'user3.jpg',
                'url' => 'https://www.google.com/',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [   "photo" => 'card2.jpg',
                'url' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                "photo" => 'card3.jpg',
                'url' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                "photo" => 'Google.jpg',
                'url' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
