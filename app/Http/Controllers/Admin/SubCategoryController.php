<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    //___index for data showing___
    public function index()
    {
        $data['subcategory'] = SubCategory::select('id','category_id','subcategory_name','subcategory_slug')->get();
        $data['category']    = Category::select('id','category_name')->get();
        return view('admin.subcategories.index',$data);
    }
    //___store data___
    public function store(Request $request)
    {
        $request->validate([
            'category_id'=>'required',
            'subcategory_name'=>'required|unique:sub_categories',
        ]);
        $subcategory = new SubCategory();
        $subcategory->category_id = $request->category_id;
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->subcategory_slug = Str::slug($request->subcategory_name,'-');
        $subcategory->save();
        //___toastr notification send___/
        $notification = array(
            'message'=>'Sub Category Added Successfully',
            'alert-type'=>'success',
        );
        return redirect()->back()->with($notification);
    }
}
