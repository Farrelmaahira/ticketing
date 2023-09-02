<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(){
        $report = Report::all();
        return view('admin.report', compact('report'));
    }
}
