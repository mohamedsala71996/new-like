<?php

namespace App\Http\Controllers\API\Website;

use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use App\Models\Subscription;
use App\Models\Work;
use Illuminate\Http\Request;
use App\Traits\UploadTrait;
use File;

class SiteSiteController extends Controller
{
    use UploadTrait;
    public function index()
    {
        return view('webSite.index');
    }
    
    public function welcom()
    {
        return view('webSite.welcom');
    }

}