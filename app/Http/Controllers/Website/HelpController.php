<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
class HelpController extends Controller
{
    public function index(){
        $settings = Setting::all();
        return view('webSite.help.help');
    }
}
