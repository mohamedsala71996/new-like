<?php

namespace App\Http\Controllers\API\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Traits\UploadTrait;
class SliderController extends Controller
{
    use UploadTrait;
    public function index(){
        $sliders = Slider::all();
        return response()->json(['sliders' => $sliders]);
    }

    public function store(Request $request){
        if ($request->hasFile('photo')) {
            $file_name = $this->saveImage($request->file('photo'), 'images/dashboard/sliders');
            $slider = new Slider();
            $slider->photo = $file_name; 
            $slider->save(); 
            return response()->json(['message' => 'تمت الإضافة بنجاح.']);
        } else {
            return response()->json(['error' => 'يرجى تحديد صورة.'], 400);
        }
    }

    public function update(Request $request, $id){
        $slider = Slider::findOrFail($id);
    
        if ($request->hasFile('photo')) {
            // حفظ الصورة الجديدة وتحديثها في قاعدة البيانات
            $file_name = $this->saveImage($request->file('photo'), 'images/dashboard/sliders');
            $slider->photo = $file_name;
        }
    
        $slider->save();
        return response()->json(['message' => 'تمت عملية التحديث بنجاح.']);
    }
    
    public function destroy($id){
        $slider = Slider::findOrFail($id);
        $slider->delete();
        return response()->json(['message' => 'تمت عملية الحذف بنجاح.']);
    }
    
}