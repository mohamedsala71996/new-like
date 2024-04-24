<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Notifications\ChangePassword;
use App\Notifications\SendCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    use UploadTrait;
    //public function getSignup(){}
    public function getSignin(){
        return view('dashboard.customer.auth.signin');
    }

    public function getSignup(){
        return view('dashboard.customer.auth.signup');
    }
    public function getSignupFromLink($id)
    {
        $invited_id = $id;
        return view('dashboard.customer.auth.signup_from_link')->with('invited_id',$invited_id);
    }

    function generateRandomCode($length = 8) {
        $min = pow(10, $length - 1);
        $max = pow(10, $length) - 1;
        return str_pad(rand($min, $max), $length, '0', STR_PAD_LEFT);
    }
    public function CustomerSignup(Request $request) {
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
            'user_id' => null,
            'invited_id'=>null,
            'verify_code'=> $this->generateRandomCode()
        ]);
//        dd($customers);
        Notification::send($customers, new SendCode($customers->verify_code));
        Auth::guard('customer')->loginUsingId($customers->id);
        return redirect()->route('webSite.index')->with('success', 'تم تسجيل الدخول بنجاح ');
    }
    public function CustomerSignupFromLink(Request $request) {
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
            'user_id' => null,
            'invited_id'=>$request->invited_id,
            'verify_code'=> $this->generateRandomCode()
        ]);
//        dd($customers);
        Notification::send($customers, new SendCode($customers->verify_code));
        Auth::guard('customer')->loginUsingId($customers->id);
        return redirect()->route('webSite.index')->with('success', 'تم تسجيل الدخول بنجاح ');
    }
    public function CustomerSignin(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ],[
            'email.required' => 'حقل مطلوب',
            'email.email' => 'ايميل غير صحيح',
            'password.required' => 'حقل مطلوب',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::guard('customer')->attempt($credentials)) {
            return redirect()->route('webSite.index')->with('success', 'تم تسجيل الدخول بنجاح ');
        }
        return redirect()->back()->with('error', 'فشل تسجيل الدخول، يرجى التحقق من البريد الإلكتروني وكلمة المرور');
    }
    public function CustomerLogout()
    {
        Auth::guard('customer')->logout();
        return redirect()->route('website.welcome')->with('success', 'تم تسجيل الخروج بنجاح ');

    }



    public function verifyEmail($code)
    {
        $user = Auth::guard('customer')->user();
        if ($user && $code == $user->verify_code) {
            $user->email_verified_at = now();
            $user->save();
            return to_route('webSite.index');
        }
        return 'the code is wording';
    }


    public function getSendForgetPassword()
    {
        return view('dashboard.customer.auth.forget_password');
    }
    public function sendForgetPassword(Request $request)
    {
        $email =$request->email;
        $code = $this->generateRandomCode();
        $user = Customer::where('email', $email)->first();
        $user->verify_code = $code;
        $user->save();

        Notification::send($user, new ChangePassword($code,$email));
        return to_route('Signin.customer')
            ->with('success','the email to change password was successfully');


    }
    public function forgetPassword(Request $request)
    {
        $email = $request->email;
        $code = $request->code;
        $customer = Customer::where('email','=' ,$email)->first();
//        dd($customer);
        if ($customer && $customer->verify_code == $code){
            return to_route('update.password',["customer"=>$customer]);
        }
        abort(403, 'You cannot reached this page');
    }

    public function update_password(Customer $customer)
    {
        return view('dashboard.customer.auth.update_password',compact('customer'));
    }

    public function changePassword(Request $request,Customer $customer)
    {

        $customer->password = Hash::make($request->newPassword);
        $customer->save();
//        dd($request->all());
        return to_route('webSite.index')->with('success','the user has been updated');

    }
}
