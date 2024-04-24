<?php

namespace App\Http\Controllers\API\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SubscriptionRequest;
use App\Models\Subscription;
use App\Traits\UploadTrait;
use File;
use Illuminate\Support\Facades\Storage;
class SubscriptionController extends Controller
{
    use UploadTrait;

    public function index(){
        $subscriptions = Subscription::where('status', 'pending')->get();
        return response()->json(compact('subscriptions'));
    }
    
    public function accepted_sub(){   
        $subscriptions = Subscription::where('status', 'active')->get();
        return response()->json(compact('subscriptions'));
    }
    public function cancelled_sub(){   
        $subscriptions = Subscription::where('status', 'cancelled')->get();
        return response()->json(compact('subscriptions'));
    }

    public function updateStatus($subscriptionId, $status)
    {
    $subscription = Subscription::find($subscriptionId);

    if (!$subscription) {
        abort(404, 'Subscription not found');
    }

    $previousStatus = $subscription->status;
    $subscription->status = $status;
    $subscription->save();

    // إذا تم تغيير الحالة إلى "active" وكانت الحالة السابقة غير "active"
    if ($status === 'active' && $previousStatus !== 'active') {
        // تحديث القيمة في جدول Customer
        $customer = $subscription->customer;
        if ($customer) {
            $customer->increment('total_earning', 5);
        }
    }

    toastr()->success('تم بنجاح');
    return response()->json(['message' => 'Subscription status updated successfully']);
    }
    public function search(Request $request)
    {
        $search = $request->get('search');
        
        // Perform search query
        $subscriptions = Subscription::whereHas('customer', function ($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        })->get();

        return response()->json(compact('subscriptions'));

    }
    
}