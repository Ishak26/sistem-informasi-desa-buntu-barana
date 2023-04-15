<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(category $category){
      return view('categoryberita',[
        "title"=>'category',
        "categoryname"=>$category,
        "category"=>$category->berita
      ]);
    }
}