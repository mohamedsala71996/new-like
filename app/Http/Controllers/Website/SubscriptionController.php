<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    use UploadTrait;
    public function subscription()
    {
        $settings = Setting::firstOrFail();
        return view('webSite.payment.payment',compact('settings'));
    }

    public function storeSubscription(Request $request)
{
    $validatedData = $request->validate([
        'payment_method' => 'required|in:vcash,ipa',
        'phone_number' => 'required|string|max:255|regex:/^[0-9]{10,20}$/',
        'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ],[
        'payment_method.required' => 'اختر طريقة الدفع',
        'phone_number.required' => 'حقل مطلوب',
        'phone_number.regex' => 'رقم الهاتف غير صحيح',
        'photo.required' => 'حقل مطلوب',
    ]);

    if ($validatedData['payment_method'] === 'vcash' || $validatedData['payment_method'] === 'ipa') {
        if ($request->hasFile('photo')) {
            $file_name = $this->saveImage($request->file('photo'), 'images/dashboard/subscriptions');
        }
        $subscriptions_data = [
            'phone_number' => $validatedData['phone_number'],
        ];

        $method = $validatedData['payment_method'];
        $customerId = Auth::guard('customer')->id();
        $currentDateTime = Carbon::now();
        $Subscription_End_Date = $currentDateTime->addYear();
        $subscriptions = Subscription::create([
            'phone_number' => $subscriptions_data['phone_number'],
            'method' => $method,
            'photo' => $file_name ?? null,
            'customer_id' => $customerId,
            'Subscription_End_Date' => $Subscription_End_Date,
        ]);

        return redirect()->route('webSite.index')->with('success', 'تم بنجاح!,برجاء انتظار تفعيل الاشتراك');
    }

    return redirect()->route('webSite.index')->with('error', 'يرجى اختيار طريقة دفع صحيحة.');
}

}
