<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ReportController extends Controller
{
    public function store(Request $request){
        $user_id = Auth::user()->id;
        $data = Report::create([
            'category_id' => $request->category_id,
            'description' => $request->description,
            'user_id' => $user_id
        ]);

        return Redirect::back()->with('success', 'Laporan Berhasil Dikirim!');
    }
}
