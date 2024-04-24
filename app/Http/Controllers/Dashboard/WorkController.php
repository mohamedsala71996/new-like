<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\WorkRequest;
use App\Models\Work;
use App\Models\Customer;
use App\Models\Screenshot;
use App\Models\Subscription; 
use File;
use Illuminate\Support\Facades\Storage;
class WorkController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:عرض الروابط', ['only' => ['getfacebooklinks','getyoutubelinks']]);
         $this->middleware('permission:اضافة رابط', ['only' => ['create','store']]);
         $this->middleware('permission:تعديل رابط', ['only' => ['edit','update']]);
         $this->middleware('permission:حذف رابط', ['only' => ['destroy']]);
         $this->middleware('permission:متابعة العمل', ['only' => ['review']]);
    }
    
    public function getfacebooklinks()
    {
        $works = Work::where(['type'=>'facebook'])->get();
        return view('dashboard.works.index',compact('works'));
    }
    public function getyoutubelinks()
    {
        $works = Work::where(['type'=>'youtube'])->get();
        return view('dashboard.works.index',compact('works'));
    }

    public function create()
    {
        $works = Work::all();
        return view('dashboard.works.create',compact('works'));
    }

    public function store(WorkRequest $request)
    {
        try {
            
            $worksData = $request->only(['description', 'link', 'type']);

            $work = Work::create([
                'description' => $worksData['description'],
                'link' => $worksData['link'],
                'type' => $worksData['type'], // إضافة النوع هنا
            ]);
            toastr()->success('تم بنجاح');
            return redirect()->route('works.create');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'حدث خطأ أثناء إضافة العمل: ' . $e->getMessage())->withInput();
        }
    }

    public function edit(string $id)
    {
        $works = Work::find($id);
        if (!$works) {
            return redirect()->route('works.index')->with(['error' => 'هزا العمل غير متاح']);
        }

        return view('dashboard.works.edit', compact('works'));
    }

    public function update(Request $request, $id)
    {
        try {
            $work = Work::findOrFail($id);
            // Update work with new photo, description, and link
            $work->update([
                'description' => $request->description,
                'link' => $request->link, // Update the link
            ]);
            toastr()->success('تم بنجاح');
            return redirect()->route('dashboard.index');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'حدث خطأ أثناء تحديث العمل: ' . $e->getMessage())->withInput();
        }
    }
    
    public function destroy(string $id)
    {
        $works = Work::destroy($id);

        if ($works) {
            toastr()->success('تم بنجاح');
            return redirect()->route('dashboard.index');
        } else {
            return redirect()->route('dashboard.index')->with('error', 'يوجد مشكله في عمليه الحذف برجاء اعاده المحاوله ف وقت لاحق');
        }
    }

    public function review(){
        $screenshots = Screenshot::all();
        $customers = Customer::all();
        $subscription =Subscription:: all();
        return view('dashboard.works.review',compact('screenshots','customers','subscription'));
    }
}
