<?php

namespace App\Http\Controllers\API\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Setting;
use App\Models\User;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\PersonalAccessToken;

class SettingController extends Controller
{


    public function index()
    {
    //return view('dashboard.users.create');
    $settings = Setting::firstOrFail(); 
    return response()->json(['settings' => $settings]);
}

    public function update(Request $request)
    {
        $settings = Setting::firstOrFail(); 
        $settings->update($request->all());
        return response()->json(['message' => 'تم حفظ الإعدادات بنجاح.']);
    }
}
