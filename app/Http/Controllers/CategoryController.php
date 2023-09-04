<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Report;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'name' => 'required'
        ]);

        try {
            Category::create([
                'name' => $request->name
            ]);
        } catch (Exception $e) {
            return Redirect::back()->with('exist', 'Kategori Dengan Nama Tersebut Sudah Ada!');
        }
        return Redirect::back()->with('msg', 'Kategori Baru Berhasil Dibuat!');
    }

    public function index()
    {
        $data = Category::all();
        return view('admin.categorylist', ['data' => $data]);
    }

    public function show($id)
    {
        $data = Category::where('id', $id);
        $data->get();
    }

    public function edit($id)
    {
        $data = Category::where('id', $id)->get();
        return view('admin.editcategory', ['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $data = Category::where('id', $id);
        $data->update([
            'name' => $request->name
        ]);

        return redirect()->back()->with(['msg' => 'Kategori Berhasil di Edit!']);
    }

    public function destroy($id)
    {
        $data = Category::where('id', $id)->delete();
        return redirect()->back()->with(['msg' => 'Kategori Berhasil Dihapus']);
    }


}
