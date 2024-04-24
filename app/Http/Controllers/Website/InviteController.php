<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Copylink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Carbon\Carbon;

class InviteController extends Controller
{
    public function index($id)
    {
        $customer = Customer::findOrFail($id);
        $inviteCode = env('APP_URL')."/Invite/create/" . $id;
        return view('webSite.invite.invite', compact('inviteCode'));
    }

    public function create($id)
    {
        return view('webSite.invite.addInvited', compact("id"));
    }

    public function store(Request $request, $id)
    {
        // Validation rules
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers',
            'phone_number' => 'required|string|max:20|unique:customers|regex:/^[0-9]{10,20}$/',
            'password' => 'required|string|min:8',
        ];
        // Validation messages
        $messages = [
            'name.required' => 'حقل مطلوب',
            'email.required' => 'حقل مطلوب',
            'email.email' => 'ايميل غير صحيح',
            'email.unique' => 'ايميل موجود مسبقا',
            'phone_number.required' => 'حقل مطلوب',
            'phone_number.regex' => 'رقم الهاتف غير صحيح',
            'phone_number.unique' => 'رقم الهاتف موجود مسبقا',
            'password.required' => 'حقل مطلوب',
            'password.min' => 'يجب الا تقل كلمة السر عن 8 حروف او ارقام',
        ];
        // Validate the request
        $validator = Validator::make($request->all(), $rules, $messages);
        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // Proceed with saving data if validation passes
        $customers = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => bcrypt($request->password),
            'user_id' => $id
        ]);
        if($id == $customers->user_id){
            $customer = Customer::findOrFail($id);
            $customer->update([
                "total_earning" => $customer->total_earning + 3
            ]);
        }
        Auth::guard('customer')->loginUsingId($customers->id);
        return redirect()->route('webSite.index')->with('success', 'تم تسجيل الدخول بنجاح ');
    }
    public function saveCopiedLinkData()
    {
        $customer = Customer::findOrFail(Auth::guard('customer')->id());
        $currentDateTime = Carbon::now();
        Copylink::create([
            'customer_id'=>$customer->id,
            'copy_date'=>$currentDateTime,
        ]);
        return response()->json(['message' => 'Copied link data saved successfully']);
    }
}
