<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.index');
    }

    public function AdminLogout()
    {
        Auth::guard('web')->logout();
        toastr()->success('تم تسجيل الخروج بنجاح ');
        return redirect()->route('login');
    }
}
