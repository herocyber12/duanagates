<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()){
            $categories = Category::whereNull('deleted_at')->get();
            return Datatables::of($categories)->make(true);
        }
        return view('categories.index');
    }
}
