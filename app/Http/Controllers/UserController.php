<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


    class UserController extends Controller
{
    public function index(){
        $users = user::all();
        return view('user.index',['users' => $users]);
        
    }

    public function create(){
        return view('user.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $newuser = User::create($data);

        return redirect(route('user.index'));
    }

    public function edit(User $user){
        return view('user.edit', ['user' => $user]);
    }
    
    public function update(User $user, Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);
        
        $user->update($data);
        return redirect(route('user.index'))->with('success','User updated successfully');
    }

    public function delete(User $user){
        $user->delete(); // Delete user
        return redirect(route('user.index'))->with('success','User deleted successfully');
    }
}

