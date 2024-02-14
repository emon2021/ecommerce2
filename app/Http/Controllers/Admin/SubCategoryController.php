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
    //_____destroy to delete data____
    public function destroy($id)
    {
        $subcategory = SubCategory::find($id)->first();
        $subcategory->delete();
        //___toastr notification send___/
        $notification = array(
            'message'=>'Sub Category Deleted Successfully',
            'alert-type'=>'warning',
        );
        return redirect()->back()->with($notification);
    }
    //_____edit to show data for editing____
    public function edit($id)
    {
        $data['subcategory'] = SubCategory::findOrfail($id); //___always use findOrfail() method to get data for ajax__
        $data['category'] = Category::select('id','category_name')->get();
        return view('admin.subcategories.edit',$data);
        
    }
    //___update data___
    public function update(Request $request)
    {
        
        //____data.validated___
        $request->validate([
            'category_id'=>'required',
            'subcategory_name'=>'required',
        ]);
        $id = $request->id;
        //___data.updated____
        $subcategory = SubCategory::where('id',$id)->first();
        $subcategory->category_id = $request->category_id;
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->subcategory_slug = Str::slug($request->subcategory_name,'-');
        $subcategory->update();
        //___toastr notification send___/
        $notification = array(
            'message'=>'Sub Category Updated Successfully',
            'alert-type'=>'success',
        );
        return redirect()->back()->with($notification);
    }
}
