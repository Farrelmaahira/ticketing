<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function admin()
    {
        $latReport = Report::latest()->take(3)->get();
        $latCategory = Category::latest()->take(3)->get();
        $latUser = User::latest()->take(3)->get();
        return view('admin.dashboard', compact('latReport','latCategory','latUser'));
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
