<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Addlink;
use Illuminate\Support\Carbon;
use App\Models\Subscription;
use App\Models\Work;
use App\Models\Setting;
use App\Models\Slider;
use Illuminate\Http\Request;
class SiteController extends Controller
{
    public function index()
    {
        $adds=Addlink::all();
//        dd($adds);
   $p1=Addlink::where('place',1)->get();
      $p2=Addlink::where('place',2)->get();
      $p3=Addlink::where('place',3)->get();
        $p4=Addlink::where('place',4)->get();
        return view('webSite.index', compact('adds','p1','p2','p3','p4'));
    }


    public function welcom()
    {
        return view('webSite.welcom');
    }





}
