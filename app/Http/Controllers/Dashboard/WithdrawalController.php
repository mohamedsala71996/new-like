<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WithdrawalRequest;
use App\Models\Withdrawal;
use App\Traits\UploadTrait;
use File;
use Illuminate\Support\Facades\Storage;
class WithdrawalController extends Controller
{
    use UploadTrait;
    function __construct()
    {
         $this->middleware('permission:العمليات المؤكدة', ['only' => ['accepted_withdrawals']]);
         $this->middleware('permission:ادارة عمليات السحب', ['only' => ['index']]);
         $this->middleware('permission:العمليات المرفوضة', ['only' => ['rejected_withdrawals']]);
         $this->middleware('permission:الموافقة على السحب', ['only' => ['accept']]);
         $this->middleware('permission:رفض السحب', ['only' => ['reject']]);
    }


    public function index(){
        $withdrawals = Withdrawal::where(['status'=>'pending'])->get();
        return view('dashboard.withdrawals.index',compact('withdrawals'));
    }
    
    public function accepted_withdrawals(){
        $withdrawals = Withdrawal::where(['status'=>'accept'])->get();
        return view('dashboard.withdrawals.accepted_withdrawals',compact('withdrawals'));
    }


    public function rejected_withdrawals(){
        $withdrawals = Withdrawal::where(['status'=>'rejected'])->get();
        return view('dashboard.withdrawals.rejected_withdrawals',compact('withdrawals'));
    }
    public function accept($id)
    {
        $withdrawal = Withdrawal::findOrFail($id);
        $withdrawal->status = 'accept'; // تحديث حالة السحب إلى "accept"
        $withdrawal->save();

        $customer = $withdrawal->customer;
        if ($customer && $withdrawal->withdrawal_amount <= $customer->total_earning) {
            $customer->total_earning -= $withdrawal->withdrawal_amount;
            $customer->save();
        }

        return redirect()->back()->with('success', 'تمت الموافقة على السحب بنجاح.');
    }

    public function reject($id)
    {
        $withdrawal = Withdrawal::findOrFail($id);
        $withdrawal->status = 'rejected'; // تحديث حالة السحب إلى "rejected"
        $withdrawal->save();
    
        return redirect()->back()->with('success', 'تم رفض السحب بنجاح.');
    }
    

}