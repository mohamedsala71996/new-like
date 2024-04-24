<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Customer_work;
use App\Models\Withdrawal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
class ProfitController extends Controller
{
    public function index()
    {
        $customerId = auth('customer')->id();
        $withdrawals = Customer::findOrFail($customerId);
        $today = Carbon::today();
        $daily_profit_count = Customer_work::where('customer_id',$customerId)->whereDate('updated_at', $today)->count();
        $withdrawal = Withdrawal::where('customer_id', $customerId)->get(); 
        $invited = Customer::where('user_id', Auth::guard('customer')->user()->id)->get();
        $totelInvited = $invited->count();
        return view('webSite.profit.index', compact('withdrawals', 'withdrawal','daily_profit_count', 'totelInvited'));
        
    }
}