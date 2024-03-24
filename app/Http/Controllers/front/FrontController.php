<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $data['categories'] = Category::all();
        $data['products']  = Product::where('slider_product',1)->select('products.*')->get();
        return view('home',$data);
    }
}
