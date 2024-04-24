<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Traits\UploadTrait;
class SliderController extends Controller
{
    use UploadTrait;

    function __construct()
    {
         $this->middleware('permission:عرض السلايدر', ['only' => ['index']]);
         $this->middleware('permission:انشاء السلايدر', ['only' => ['create','store']]);
         $this->middleware('permission:تعديل السلايدر', ['only' => ['edit','update']]);
         $this->middleware('permission:حذف السلايدر', ['only' => ['destroy']]);
    }

    public function index(){
        $sliders = Slider::all();
        return view('dashboard.setting.slider',compact('sliders'));
    }

    public function create(){
        return view('dashboard.setting.createSlider');
    }

    public function store(Request $request){
        if ($request->hasFile('photo')) {
            $file_name = $this->saveImage($request->file('photo'), 'images/dashboard/sliders');

            $slider = new Slider();
            $slider->photo = $file_name;
            $slider->type = $request->type; // إضافة حفظ القيمة لحقل "type"

            $slider->save();

            return redirect()->back()->with('success', 'تمت الإضافة بنجاح.');
        } else {
            return redirect()->route('sliders.index')->with('error', ' يرجى تحديد صورة او مراجعه النوع.');
        }
    }


    public function edit(Request $request, $id){
        $sliders = Slider::findOrFail($id);
        return view('dashboard.setting.editSlider', compact('sliders'));
    }
    public function update(Request $request, $id){
        $slider = Slider::findOrFail($id);

        if ($request->hasFile('photo')) {
            // حفظ الصورة الجديدة وتحديثها في قاعدة البيانات
            $file_name = $this->saveImage($request->file('photo'), 'images/dashboard/sliders');
            $slider->photo = $file_name;
        }

        // تحديث النوع إذا كان قيمة مختلفة مع التحقق من وجود قيمة معينة
        if ($request->has('type')) {
            $slider->type = $request->type;
        }

        $slider->save();
        return redirect()->route('sliders.index')->with('success', 'تمت عملية التحديث بنجاح.');
    }


    public function destroy($id){
        $slider = Slider::findOrFail($id);
        $slider->delete();
        return redirect()->route('sliders.index')->with('success', 'تمت عملية الحذف بنجاح.');
    }

}
