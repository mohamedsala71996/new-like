<?php

namespace App\Http\Controllers\API\Website;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class SubscriptionSiteController extends Controller
{
    use UploadTrait;
    public function subscription()
    {
        return view('webSite.payment.payment');
    }

    public function storeSubscription(Request $request)
    {
    $validatedData = $request->validate([
        'method' => 'required|in:vcash,ipa', 
        'phone_number' => 'required|string|max:255|regex:/^[0-9]{10,20}$/', 
        'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
    ],[
        'method.required' => 'اختر طريقة الدفع',
        'phone_number.required' => 'حقل مطلوب',
        'phone_number.regex' => 'رقم الهاتف غير صحيح',
        'photo.required' => 'حقل مطلوب',
    ]);

    if ($validatedData['method'] == 'vcash' || $validatedData['method'] == 'ipa') {
        if ($request->hasFile('photo')) {
            $file_name = $this->saveImage($request->file('photo'), 'images/dashboard/subscriptions');
        }
        $subscriptions_data = [
            'phone_number' => $validatedData['phone_number'],
        ];

        $method = $validatedData['method'];
        $customerId = auth()->guard('sanctum')->id();
        $currentDateTime = Carbon::now();
        $Subscription_End_Date = $currentDateTime->addYear();
        $subscriptions = Subscription::create([
            'phone_number' => $subscriptions_data['phone_number'],
            'method' => $method,
            'photo' => $file_name ?? null, 
            'customer_id' => $customerId,
            'Subscription_End_Date' => $Subscription_End_Date,
        ]);
        return response()->json(['message' => 'Subscription stored successfully'], 201);
    }

    return response()->json(['error' => 'يرجى اختيار طريقة دفع صحيحة.'], 400);
}

}