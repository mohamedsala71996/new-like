<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SubscriptionRequest;
use App\Models\Subscription;
use App\Models\Customer;
use App\Traits\UploadTrait;
use File;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
class SubscriptionController extends Controller
{
    use UploadTrait;

    function __construct()
    {
         $this->middleware('permission:مراجعة الاشتراكات', ['only' => ['index']]);
         $this->middleware('permission:الاشتراكات المفعلة', ['only' => ['accepted_sub']]);
         $this->middleware('permission:الاشتراكات الملغية', ['only' => ['cancelled_sub']]);
         $this->middleware('permission:الغاء الاشتراك', ['only' => ['makeCancel']]);
         $this->middleware('permission:اعادة تفعيل الاشتراك', ['only' => ['reActive']]);
         $this->middleware('permission:تفعيل الاشتراك', ['only' => ['active']]);
         $this->middleware('permission:البحث في الاشتراكات', ['only' => ['search']]);
    }
    public function index(){
        $subscriptions = Subscription::where('status', 'pending')->get();
        return view('dashboard.subscriptions.index', compact('subscriptions'));
    }
    
    public function accepted_sub()
    {
    $subscriptions = Subscription::where('status', 'active')->get();
    $currentDateTime = Carbon::now();

    // فحص تاريخ انتهاء الاشتراك وتحديث الحالة إذا كان منتهياً
    foreach ($subscriptions as $subscription) {
        if ($currentDateTime >= $subscription->Subscription_End_Date) {
            $subscription->status = 'cancelled';
            $subscription->save();
        }
    }

    $subscriptions = Subscription::where('status', 'active')->get();
    return view('dashboard.subscriptions.accepted_subscription', compact('subscriptions'));
    }
    public function cancelled_sub(){   
        $subscriptions = Subscription::where('status', 'cancelled')->get();
        return view('dashboard.subscriptions.cancelled_subscription', compact('subscriptions'));
    }


    public function makeCancel($id)
    {
        $subscription = Subscription::findOrFail($id);
        $subscription->status = 'cancelled'; // تغيير الحالة إلى ملغي
        $subscription->save();
    
        return redirect()->back()->with('success', 'تم إلغاء الاشتراك بنجاح.');
    }

    public function reActive($id)
    {
        $subscription = Subscription::findOrFail($id);
        $subscription->status = 'active'; // تغيير الحالة إلى نشط
        $subscription->save();
    
        return redirect()->back()->with('success', 'تم رد الاشتراك بنجاح.');
    }

    public function active($id)
    {
        $subscription = Subscription::find($id);

        if (!$subscription) {
            return redirect()->back()->with('error', 'الاشتراك غير موجود.');
        }

        $subscription->status = 'active'; // تغيير الحالة إلى نشط
        $customer = $subscription->customer;

        $subscription->save();

        return redirect()->back()->with('success', 'تم الاشتراك بنجاح.');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        
        // Perform search query
        $subscriptions = Subscription::whereHas('customer', function ($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        })->get();

        return view('dashboard.subscriptions.accepted_subscription', compact('subscriptions'));
    }
    
    
}