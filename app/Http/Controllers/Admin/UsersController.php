<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    function index(){
        return view('admin.backend.users.index');
    }

    function create(){
        return view('admin.backend.users.create');

    }

    function store(Request $request){
        
    }

    function edit(User $user){
        
    }

    public function update(Request $request, User $user){
        
    }

    
    public function destroy(User $user){
        
    }
}


