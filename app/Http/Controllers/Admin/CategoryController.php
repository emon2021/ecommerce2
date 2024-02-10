<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //___category.index___/
    public function index()
    {
        $data['cat'] = Category::all();
        return view('admin.categories.index',$data);
    }
}
