<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Category;
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
        $categories = Category::all();
        return view('admin.editreport', compact('report', 'categories'));
    }

    public function edit($id)
    {
        $report = Report::where('id', $id)->get();
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'description' => 'required',
            'category_id' => 'required'
        ]);
        $report = Report::where('id', $id);
        $report->update([
            'description' => $request->description,
            'category_id' => $request->category_id
        ]);
        return redirect()->back()->with(['msg' => 'Laporan Berhasil di Edit!']);
    }

    public function destroy($id)
    {
        $report = Report::where('id', $id);
        $report->delete();

        return redirect()->back()->with(['msg' => 'Laporan Berhasil di Hapus!']);
    }
}



