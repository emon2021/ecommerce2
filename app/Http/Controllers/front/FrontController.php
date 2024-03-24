<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //  category showing
    public function index()
    {
        $data['categories'] = Category::all();
        $data['products']  = Product::where('slider_product',1)->select('products.*')->get();
        return view('home',$data);
    }

     //  single-product page show
     public function singleProduct($slug)
     {
        $data['single_product'] = Product::where('slug',$slug)->first();
         return view('frontend.product_details',$data);
     }
}
