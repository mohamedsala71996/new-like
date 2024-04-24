<?php

namespace App\Http\Controllers\API\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\PersonalAccessToken;

class LoginController extends Controller
{


    public function signup(Request $request)
    {
        // Validation rules
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers',
            'password' => 'required|string|min:8',
        ];

        // Validation messages
        $messages = [
            'name.required' => 'حقل الاسم مطلوب',
            'email.required' => 'حقل البريد الإلكتروني مطلوب',
            'email.email' => 'البريد الإلكتروني غير صحيح',
            'email.unique' => 'البريد الإلكتروني موجود مسبقاً',
            'password.required' => 'حقل كلمة المرور مطلوب',
            'password.min' => 'يجب أن تتكون كلمة المرور من الأقل 8 أحرف',
        ];

        // Validate the request
        $validator = Validator::make($request->all(), $rules, $messages);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Proceed with saving data if validation passes
        $customer = User::create($request->all());
        $token =  $customer->createToken('user token')->plainTextToken;
        return response()->json(['message' => 'تم تسجيل العميل بنجاح','token' => $token], 201);
    }

    public function signin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        $user = User::where('email', $request->input('email'))->first();
        if ($user && Hash::check($request->input('password'),  $user->password)) {

            $token = $user->createToken('user token')->plainTextToken;
            return response()->json(['token' => $token, $user], 200);
        } else {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
    }



    public function logout($token=null)
    {
        $user = Auth::guard('sanctum')->user();
        if ($token == null) {
            $token = $user->currentAccessToken()->delete();
            return response()->json(['message' => 'current access token revoked successfully']);
        }
        $PersonalAccessToken = PersonalAccessToken::findToken($token);
        if ($user->id == $PersonalAccessToken->tokenable_id && get_class($user) == $PersonalAccessToken->tokenable_type) {
            $PersonalAccessToken->delete();
            return response()->json(['message' => 'Access token revoked successfully']);
        }
        Auth::guard('web')->logout();

        return response()->json(['message' => 'Invalid token'], 401);

      }
}