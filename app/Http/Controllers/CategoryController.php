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
        try {
            Category::create([
                'name' => $request->name
            ]);
        } catch (Exception $e) {
            return Redirect::back()->with('exist', 'Kategori Dengan Nama Tersebut Sudah Ada!');
        }
        return Redirect::back()->with('msg', 'Kategori Baru Berhasil Dibuat!');
    }

    public function index(){
        $data = Category::all();
        return view('admin.category', ['data' => $data]);
    }

    public function show(){
        $data = Category::all();
        return view('admin.categorylist', ['data' => $data]);
    }


}
