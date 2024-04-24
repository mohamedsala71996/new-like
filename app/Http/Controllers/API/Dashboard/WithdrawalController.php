<?php

namespace App\Http\Controllers\API\Dashboard;

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

    public function index(){
        $withdrawals = Withdrawal::where(['status'=>'pending'])->get();
        return response()->json(compact('withdrawals'));
    }
    
    public function accepted_withdrawals(){
        $withdrawals = Withdrawal::where(['status'=>'accept'])->get();
        return response()->json(compact('withdrawals'));
    }

    public function rejected_withdrawals(){
        $withdrawals = Withdrawal::where(['status'=>'rejected'])->get();
        return response()->json(compact('withdrawals'));
    }

    public function updateStatus($withdrawalId, $status)
    {
        $withdrawal = Withdrawal::find($withdrawalId);

        if (!$withdrawal) {
            abort(404, 'Withdrawal not found');
        }

        if ($status === 'accept') {
            // تحديث حالة السحب
            $withdrawal->status = $status;
            $withdrawal->save();

            // خصم قيمة السحب من رصيد العميل
            $customer = $withdrawal->customer;
            if ($customer) {
                $customer->total_earning -= $withdrawal->withdrawal_amount;
                $customer->save();
            }

            toastr()->success('تم الموافقة على عملية السحب بنجاح');
            return response()->json(['message' => 'Withdrawal accepted successfully']);
        } elseif ($status === 'rejected') {
            // تحديث حالة السحب فقط في حالة الرفض
            $withdrawal->status = $status;
            $withdrawal->save();

            toastr()->info('تم رفض عملية السحب');
            return response()->json(['message' => 'Withdrawal rejected']);
        } else {
            // في حالة القيمة غير المتوقعة لحالة السحب
            abort(400, 'Invalid status');
        }
    }
    
}