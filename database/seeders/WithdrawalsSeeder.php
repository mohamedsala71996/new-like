<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WithdrawalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customers = Customer::all();
        foreach($customers as $customer){
            $customerr = $customer->id;
        }
        DB::table('withdrawals')->insert([
            "customer_id" => $customerr,
            'phone_number' => '1234567890',
            'withdrawal_amount' => 10000,
            'status' => 'accept',
            'methoud' => 'cach',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
