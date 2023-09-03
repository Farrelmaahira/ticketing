<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ReportController extends Controller
{

    public function index()
    {
        $report = Report::all();
        return view('admin.report', compact('report'));

    }

    public function store(Request $request){
        $user_id = Auth::user()->id;
        $data = Report::create([
            'category_id' => $request->category_id,
            'description' => $request->description,
            'user_id' => $user_id
        ]);

        return Redirect::back()->with('success', 'Laporan Berhasil Dikirim!');
    }

    public function show($id)
    {
        $report = Report::where('id', $id)->get();
    }

    public function edit($id)
    {
        $report = Report::where('id', $id)->get();
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'report' => 'required',
            'category_id' => 'required'
        ]);
        $report = Report::where('id', $id);
        $report->update([
            'report' => $request->report,
            'category_id' => $request->category_id
        ]);
    }

    public function destroy($id)
    {
        $report = Report::where('id', $id);
        $report->delete();
    }
}



