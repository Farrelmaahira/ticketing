<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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

    return redirect()->back()->with(['msg' => 'Akun Pengguna Berhasil Dibuat!']);

    }

    public function newUser(){
        return view('admin.newuser');
    }

    public function index(){
        $data = User::all();
        return view('admin.userlist', ['data' => $data]);
    }

    public function show($id)
    {
        $data = User::where('id', $id)->get();
        return view('admin.edituser', ['data' => $data]);
    }

    public function edit($id)
    {
        $data = User::where('id', $id)->get();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $hash = Hash::make($request->password);

        $data = User::where('id', $id);
        $data->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hash
        ]);

        return redirect()->back()->with(['msg' => 'Akun pengguna berhasil di edit']);

    }

    public function destroy($id)
    {
        $data = User::where('id', $id);
        $data->delete();

        return redirect()->back()->with(['msg' => 'Akun pengguna berhasil di hapus']);
    }
}
