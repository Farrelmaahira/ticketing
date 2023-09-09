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
        return view('admin.report', ['data' => $report]);

    }

    public function store(Request $request){

        // dd($request);
        $title = $request->title;
        
        $request->validate([
            'image' => 'image|nullable|max:9999'
        ]);

        $request['user_id'] = Auth::user()->id;
        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";

            $data = Report::create($input);
        }else{
    
            $data = Report::create([
                'title' => $request->title,
                'category_id' => $request->category_id,
                'description' => $request->description,
                'user_id' => $user_id,
            ]);
        }

        return Redirect::back()->with('success', 'Laporan Berhasil Dikirim!');
    }

    public function show($id)
    {
        $report = Report::where('id', $id)->get();
        return view('admin.singlereport', ['data' => $report]);
    }

    public function edit($id)
    {
        $report = Report::where('id', $id)->get();
        $categories = Category::all();
        return view('admin.editreport', compact('report', 'categories'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'description' => 'required',
            'category_id' => 'required'
        ]);
        $report = Report::where('id', $id);
        $report->update([
            'title' => $request->title,
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



