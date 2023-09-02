<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function admin()
    {
        return view('admin.dashboard');
    }

    public function user()
    {
        return view('user.dashboard');
    }

    public function category(){
        return view('admin.category');
    }

    public function report(){
        $data = Category::all();
        return view('user.report', ['data' => $data]);
    }
}
