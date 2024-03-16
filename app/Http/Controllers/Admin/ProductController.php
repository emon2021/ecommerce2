<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\PickupPoint;
use App\Models\SubCategory;
use App\Models\WareHouse;
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

    //_______child.view.on.product.page_______
    public function childView(Request $request)
    {
        $child_cat = ChildCategory::select('id','childcategory_name')->where('subcategory_id',$request->id)->get();
        return response()->json($child_cat);
    }

    //_______product.create________
    public function create()
    {  
        $data['category'] = Category::all();
        $data['brands'] = Brand::all();
        //$data['child']  = ChildCategory::all();
        $data['pickup'] = PickupPoint::all();
        $data['warehouses'] = WareHouse::all();
        return view( "admin.products.create",$data);
    }

    //_________product.store________
    public function store(Request $request)
    {
        dd($request->all());
    }



}
