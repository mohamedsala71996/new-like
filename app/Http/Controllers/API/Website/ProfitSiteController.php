<?php

namespace App\Http\Controllers\API\Website;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Customer_work;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
class ProfitSiteController extends Controller
{
    public function index()
    {
        $customerId = auth('sanctum')->id();
        $withdrawals = Customer::findOrFail($customerId);
        $today = Carbon::today();
        $daily_profit_count = Customer_work::where('customer_id',$customerId)->whereDate('updated_at', $today)->count();        
        return response()->json([
            'withdrawals' => $withdrawals,
            'daily_profit_count' => $daily_profit_count
        ]); 
    
    }
}
