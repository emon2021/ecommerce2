<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\PickupPoint;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //_____auth check_____
    public function __construct() 
    {
        $this->middleware(['auth' , 'is_admin']);
    }

    //_______product.fetch.subcategory________
    public function subcategory(Request $request)
    {
        $id = $request->id;
        $sub = SubCategory::select('id','subcategory_name')->where('category_id',$id)->get();
        return view( "admin.products.subcategory",compact('sub'));
    }

    //_______product.create________
    public function create(Request $request)
    {  
        $data['category'] = Category::all();
        $data['brands'] = Brand::all();
        $data['child']  = ChildCategory::all();
        $data['pickup'] = PickupPoint::all();
        return view( "admin.products.create",$data);
    }
}
