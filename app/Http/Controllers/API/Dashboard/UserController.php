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

class UserController extends Controller
{
    use UploadTrait;

    // all users
    public function index(){
        $users = User::all();
        return response()->json(compact('users'));
    }

    // Create users
    public function create(){
        $roles = User::all();
        return view('dashboard.users.create',compact('roles'));
    }

    public function store(UserRequest $request){
        try {
            //save photo
            $file_name=$this ->saveImage($request->photo,'images/dashboard/admins');
            //fetch data
            $admins = $request->all();
            //hash password
            $hashedPassword = Hash::make($admins['password']);
            //store data
            $admins = User::create([
                'name'=> $admins['name'],
                'email'=> $admins['email'],
                'password'=> $hashedPassword ,
                'photo'=>$file_name,
            ]);
            return response()->json(['message' => 'Admin added successfully']);
            } catch (\Exception $e) {
                return response()->json(['error' => 'Error adding Admin: ' . $e->getMessage()], 500);
            }
    }

    public function edit($id) {
        $users = User::find($id);
    
        if (!$users) {
            return redirect()->route('users.index')->with(['error' => 'This Admin Is Not Found']);
        }
    
        return view('dashboard.users.edit', compact('users'));
    }

    public function update(Request $request, $id)
    {
    try {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        if ($request->hasFile('photo')) {

            // Save the new image
            $file_name = $this->saveImage($request->photo, 'images/dashboard/admins');

            // Update the movie with the new image
            $user->update([
                'photo' => $file_name
            ]);
        }

        // Update other data
        $user->update($request->except('photo'));

        return response()->json(['message' => 'User updated successfully']);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Error updating User: ' . $e->getMessage()], 500);
    }
    }

    public function destroy ($id){
        $users = User::destroy($id);

        if ($users) {
            return response()->json(['message' => 'User deleted successfully']);
        } else {
            return response()->json(['error' => 'Failed to delete user'], 500);
        }
    }



}