<?php

namespace App\Http\Controllers;
use App\DataTables\UserDataTable;
use App\Models\User;
use Illuminate\Http\Request;
class UserController extends Controller
{
    public function index(UserDataTable $dataTables)
    {
        return $dataTables->render('admin.pages.users.index');
    }
    public function create()
    {
        return view('admin.pages.users.create' );
    }
    public function store(Request $request)
    {
        
        // Data Validate
        $request->validate([
            'name' => ['required', 'string'],
            'email' => 'required|email|unique:users',
            'password' => [
                'required',
                'min:8',
                'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/'
            ],
            'phone' =>  ['required',
            'regex:/^(079|078|077)\d{7}$/'
            ,'max:10'],
         
            'gender' => ['required', 'string'],
            'role' => ['required', 'string']

        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->password),
            'phone' => $request->input('phone'), 
            'gender' => $request->input('gender'), 
            'role' => $request->input('role'),
        ]);
        

        $notification = array(
            'message' => 'User Created Successfully!!',
            'alert-type' => 'success',
        );

        return redirect()->route('user_admin.index')->with($notification);
    }

    
    public function edit($id)
    {
        $admin = User::findOrFail($id);
        return view('admin.pages.users.edit', compact('admin'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => 'required|email',
            // 'password' => [
            //     'required',
            //     'min:8',
            //     'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/'
            // ],
            'phone' =>  ['required',
            'regex:/^(079|078|077)\d{7}$/'
            ,'max:10'],
         
            'gender' => ['required', 'string'],
            'role' => ['required', 'string']

        ]);
    
        // Retrieve the user by ID
        $user = User::findOrFail($id);
    
        // Update the user details
        $user->name = $request->name;
        $user->email = $request->email;
        // $user->password = $request->password;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->role = $request->role;

    
        // Update the user's image if a new image is provided
        if ($request->hasFile('image')) {
            $imagePath = $this->updateImage($request, 'image', 'uploads', $user->image);
            $user->image = $imagePath;
        }
    
        // Save the updated user details
        $user->save();
    
        $notification = array(
            'message' => 'User Updated Successfully!!',
            'alert-type' => 'success',
        );
    
        return redirect()->route('user_admin.index')->with($notification);
    }
    
    public function destroy($id)
    {
        try{
            $user = User::findOrFail($id);
            $user->delete();
            return response(['status' => 'success', 'message' => 'Deleted Successfully!']);}
            catch  (\Exception $e) {
                Log::error("Error deleting user: {$e->getMessage()}");
            }
    }
}
