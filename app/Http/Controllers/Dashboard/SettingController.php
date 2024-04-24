<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:عرض الاعدادات', ['only' => ['index']]);
         $this->middleware('permission:تعديل الاعدادات', ['only' => ['update']]);
    }
    public function index()
    {
    //return view('dashboard.users.create');
    $settings = Setting::firstOrFail(); 
    return view('dashboard.setting.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $settings = Setting::firstOrFail(); 
        $settings->update($request->all());
        return redirect()->route('settings.index')->with('success', 'تم حفظ الإعدادات بنجاح.');
    }
}
