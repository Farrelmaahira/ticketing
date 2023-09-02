<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class NewUserController extends Controller
{
    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8'
        ]);

        $hash = Hash::make($request->password);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hash
        ]);

        $user->assignRole('user');

        return redirect('/');

    }

    public function newUser(){
        return view('admin.newuser');
    }
}
