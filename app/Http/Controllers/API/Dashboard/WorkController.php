<?php

namespace App\Http\Controllers\API\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Screenshot;
use App\Models\Work;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class WorkController extends Controller
{
    use UploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function getFacebookLinks()
    {
        $works = Work::where(['type'=>'facebook'])->get();
        return response()->json($works);
    }

    public function getYoutubeLinks()
    {
        $works = Work::where(['type'=>'youtube'])->get();
        return response()->json($works);
    }
    
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try { 
             $work = Work::create([
                 'description' =>$request->description,
                 'link' => $request->link,
                 'type' => $request->type, // إضافة النوع هنا
             ]);
            return response()->json(['message' => 'Work added successfully', 'work' => $work], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while adding the work', 'message' => $e->getMessage()], 500);
        }
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $work = Work::findOrFail($id);
              
            // Update work with new photo, description, and link
            $work->update([
                'description' => $request->description,
                'link' => $request->link, // Update the link
                'type' => $request->type, // Update the type
            ]);
            return response()->json(['message' => 'Work updated successfully', 'work' => $work], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while updating the work', 'message' => $e->getMessage()], 500);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $work = Work::findOrFail($id);
            $deleted = $work->delete();
    
            if ($deleted) {
                return response()->json(['message' => 'Work deleted successfully'], 200);
            } else {
                return response()->json(['error' => 'Failed to delete work'], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while deleting the work', 'message' => $e->getMessage()], 500);
        }
    
    }

    public function review(){
        $screenshots = Screenshot::all();
        $customers = Customer::all();
        return response()->json($screenshots,$customers);

    }
}