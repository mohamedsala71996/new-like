<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Copylink;
use App\Models\Customer;

class CopiedLinkController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:روابط الدعوة', ['only' => ['index','show']]);
    }
    public function index(Request $request){
        $customersInvat=Customer::pluck('invited_id')->toArray();     
        $customers = Customer::whereIn('id',$customersInvat)->orderBy('id','DESC')->paginate(5);        
        return view('dashboard.copied-links.index',compact('customers'))
            ->with('i', ($request->input('page', 1) - 1) * 5);        
    }
    public function show($id)
    {
        $customers = Customer::where('invited_id',$id)->get();
      
        return view('dashboard.copied-links.show',compact('customers'));
    }
    
}
 