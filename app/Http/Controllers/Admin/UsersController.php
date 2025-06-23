<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\UserCreatedMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;


class UsersController extends Controller
{
    function index(){
         $users = User::where('role', '!=', 'admin')
                 ->latest()
                 ->get();
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
    ]);

    $user = new User();
    $user->first_name = $request->f_name;
    $user->last_name = $request->l_name;
    $user->email = $request->user_email;
    $user->role = $request->user_role;
    $user->save();

    $token = Password::createToken($user);

    $resetUrl = url(route('password.reset', ['token' => $token, 'email' => $user->email], false));

    Mail::to($user->email)->send(new \App\Mail\UserCreatedMail($user, $resetUrl));

      return response()->json([
        'status' => true,
        'title' => 'Success',
        'message' => 'User created successfully! Password setup link sent.',
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
        'password' => 'nullable|string|min:6|same:password_re',
    ]);
    $user = User::findOrFail($id); 
    $user->first_name = $request->f_name;
    $user->last_name = $request->l_name;
    $user->role = $request->user_role;
    // $passwordUpdated = false;
    // if ($request->filled('password')) {
    //      $passwordUpdated = true;
    //     $user->password = Hash::make($request->password);
    // }    
    
    // if ($passwordUpdated) {
    //     Mail::to($user->email)->send(new \App\Mail\PasswordUpdated($user));
    // }
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

    public function sendResetLink($id)
    {
        $user = User::findOrFail($id);

        // Send password reset link using Laravel's built-in broker
        $status = Password::sendResetLink(['email' => $user->email]);

        if ($status === Password::RESET_LINK_SENT) {
            return response()->json([
                'status' => true,
                'message' => 'Password reset link sent to ' . $user->email,
                'icon' => 'success',
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Failed to send reset link.',
            'icon' => 'error',
        ]);
    }


    public function toggleStatus(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $status = filter_var($request->status, FILTER_VALIDATE_BOOLEAN);
        $user->status = $status ? 1 : 0;
        $user->save();

        return response()->json([
            'status' => true,
            'message' => 'User status updated successfully!',
        ]);
    }

    
   public function destroy($id)
    {
        $user = User::findOrFail($id); // Find the user by ID or fail with 404
        $user->delete();

        return redirect()->route('admin.user.index')->with('success', 'User deleted successfully!');
    }
}


