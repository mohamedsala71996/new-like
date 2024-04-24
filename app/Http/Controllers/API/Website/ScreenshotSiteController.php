<?php

namespace App\Http\Controllers\API\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\WorkRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Screenshot;
use App\Traits\UploadTrait;
use File;
use Illuminate\Support\Facades\Validator;

class ScreenshotSiteController extends Controller
{
    use UploadTrait;
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif', // Adjust max file size as needed
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $file_name = $this->saveImage($request->photo, 'images/website/screenshots');
        $customer = Customer::findOrFail(1);
        $customer->screenshots()->create([
            'photo' => $file_name,
        ]);
        
        return response()->json(['message' => 'Screenshot stored successfully'], 201);
    }

}