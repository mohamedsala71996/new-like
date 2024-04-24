<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Screenshot;
use App\Traits\UploadTrait;
use File;
class ScreenshotController extends Controller
{
    use UploadTrait;
    public function store(WorkRequest $request)
    {
        $file_name = $this->saveImage($request->photo, 'images/website/screenshots');
        $screenshot = Screenshot::create([
            'photo' => $file_name,
        ]);
        

        return redirect()->back()->with('success', 'تمت  المهمه بنجاح ');
    }

}
