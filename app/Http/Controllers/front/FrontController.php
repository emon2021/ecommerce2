<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //   showing element on the home page
    public function index()
    {
        $data['categories'] = Category::all();
        $data['products']  = Product::where('slider_product', 1)->select('products.*')->get();
        $data['featured_product'] = Product::where('featured',1)->get();
        $data['hot_deal'] = Product::where('hot_deal',1)->get();
        $data['trendy_products'] = Product::where('trendy',1)->get();
        return view('home', $data);
    }

    //  single-product page show with  data passing from here.
    public function singleProduct($slug)
    {
        $data['single_product'] = Product::where('slug', $slug)->first();
        $data['related_product'] = Product::where('category_id', $data['single_product']->category_id)->orderBy('id', 'DESC')->limit(10)->get();
        return view('frontend.product_details', $data);
    }

    //  quick view product
    public function quick_view($id)
    {
        $data['quickView'] = Product::findOrFail($id);
        $data['review'] = Review::where( 'product_id' ,$id )->avg( 'rating' );
        return view('frontend.pages.quick_view',$data);
    }

    
}
