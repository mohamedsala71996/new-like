<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddLinks\CreateLinkRequest;
use App\Http\Requests\AddLinks\UpdateLinkRequest;
use App\Models\Addlink;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddlinkController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:عرض الاعلانات', ['only' => ['index']]);
         $this->middleware('permission:انشاء الاعلانات', ['only' => ['create','store']]);
         $this->middleware('permission:تعديل الاعلانات', ['only' => ['edit','update']]);
         $this->middleware('permission:حذف الاعلانات', ['only' => ['destroy']]);
    }
    public function index(){
        $adds = Addlink::all();
        return view('dashboard.adds.addindex',compact('adds'));
    }
    public function create(){
        return view('dashboard.adds.addcreate');
    }
    public function store(CreateLinkRequest $request)
    {
        try {
            DB::beginTransaction();
            $validatedData = $request->validated();

            if ($request->hasFile('attachment')) {
                $imageName = time() . '_' . $request->company_name . '.' . $request->attachment->extension();
                $request->attachment->move(public_path('images/dashboard/adds'), $imageName);
                $validatedData['attachment'] = $imageName;
            }
            Addlink::create($validatedData);

            DB::commit();

            toastr()->success('تم بنجاح');
            return redirect()->route('adds.index');
        } catch (Exception $e) {
            DB::rollback();
            return back()->with('error', 'Error adding Add: ' . $e->getMessage())->withInput();
        }
    }

    public function edit(Addlink $addlink){
        return view('dashboard.adds.addedit', compact('addlink'));
    }
    public function update(UpdateLinkRequest $request, Addlink $addlink)
    {
        try {
            DB::beginTransaction();

            $validatedData = $request->validated();

            if ($request->hasFile('attachment')) {
                $imageName = time() . '_' . $request->company_name . '.' . $request->attachment->extension();
                $request->attachment->move(public_path('images/dashboard/adds'),$imageName);
                $validatedData['attachment'] = $imageName;
            }

            $addlink->update($validatedData);
            DB::commit();

            toastr()->success('تم بنجاح');
            return redirect()->route('adds.index');
        } catch (QueryException $e) {
            DB::rollback();
            return back()->with('error', 'Error updating Add: ' . $e->getMessage())->withInput();
        }
    }
    public function destory(Addlink $addlink){
        try{
            $addlink->delete();
            toastr()->success('تم بنجاح');
            return redirect()->route('adds.index');
        }catch(Exception $e){
            return back()->with('error', 'Error adding Add: ' . $e->getMessage())->withInput();
        }
    }

}
