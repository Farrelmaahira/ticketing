<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class AuthController extends Controller
{

    public function login()
    {
        return view('auth.login');
    }

    public function signin(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $user = User::where('email', $request->email)->first();
        if(Auth::attempt($validate))
        {
            if($user->hasRole('admin'))
            {
                return redirect('/dashboard/admin');
            } else {
                return redirect('/home');
            }
        }
    }

    public function register()
    {
        return view('auth.register');
    }

    public function signup(Request $request)
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

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/');
    }

}
