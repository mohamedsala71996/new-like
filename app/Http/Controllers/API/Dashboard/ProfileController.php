<?php
namespace App\Http\Controllers\API\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Traits\UploadTrait;
use File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    use UploadTrait;

    public function get_Profile(){
        $users = User::all();
        return response()->json(compact('users'));
    }

    public function profileUpdate(UserRequest $request){

        try {
            $users=User::Find(auth()->guard('sanctum')->id());

            if (!$users) {
                return response()->json(['error' => 'User not found'], 404);
            }
            // Check if the request has an image
            if ($request->hasFile('photo')) {

                // Save the new image
                $file_name = $this->saveImage($request->photo, 'images/dashboard/admins');

                // Update the movie with the new image
                $users->update([
                    'photo' => $file_name
                ]);
            }

            // Update other data
            $users->update($request->except('photo'));
            return response()->json(['message' => 'Profile updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error updating Data: ' . $e->getMessage()], 500);
        }

    }


}
