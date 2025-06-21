<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\UserCreatedMail;
use Illuminate\Support\Facades\Mail;


class UsersController extends Controller
{
    function index(){
         $users = User::latest()->get();
        return view('admin.backend.users.index', compact('users'));
    }

    function create(){
        return view('admin.backend.users.create');

    }

    function store(Request $request){
    $request->validate([
        'f_name' => 'required|string|max:255',
        'l_name' => 'required|string|max:255',
        'user_email' => 'required|email|unique:users,email',
        'user_role' => 'required|in:client,team',
        'status' => 'required|in:0,1',
        'password' => 'required|string|min:6|same:password_re',
    ]);

    $user = new User();
    $user->first_name = $request->f_name;
    $user->last_name = $request->l_name;
    $user->email = $request->user_email;
    $user->role = $request->user_role;
    $user->status = $request->status;
    $user->password = Hash::make($request->password);
    $user->save();
    Mail::to($user->email)->send(new UserCreatedMail($user));

      return response()->json([
        'status' => true,
        'title' => 'Success',
        'message' => 'User created successfully!',
        'icon' => 'success',
        'auto_redirect' => false,
        'redirect_url' => route('admin.user.index')
    ]);
    }

    function edit(User $user){
    return view('admin.backend.users.edit', compact('user'));        
    }

    public function update(Request $request, $id){
         
    $request->validate([
        'f_name' => 'required|string|max:255',
        'l_name' => 'required|string|max:255',
        'user_role' => 'required|in:client,team',
        'status' => 'required|in:0,1',
        'password' => 'nullable|string|min:6|same:password_re',
    ]);
    $user = User::findOrFail($id); 
    $user->first_name = $request->f_name;
    $user->last_name = $request->l_name;
    $user->role = $request->user_role;
    $user->status = $request->status;
    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }    
    $user->save();

    return response()->json([
        'status' => true,
        'title' => 'Updated',
        'message' => 'User updated successfully!',
        'icon' => 'success',
        'auto_redirect' => true,
        'redirect_url' => route('admin.user.index')
    ]);
    }

    
   public function destroy($id)
    {
        $user = User::findOrFail($id); // Find the user by ID or fail with 404
        $user->delete();

        return redirect()->route('admin.user.index')->with('success', 'User deleted successfully!');
    }
}


