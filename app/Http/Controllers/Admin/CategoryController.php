<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    //___category.index___/
    public function index()
    {
        $data['cat'] = Category::all();
        return view('admin.categories.index',$data);
    }

    //_____category.create___/
    public function store(Request $request)
    {
        //_____validated____/
        $request->validate([
            'category_name' => 'required|unique:categories',
        ]);
        //_____data save to category table____/
        $cat = new Category();
        $cat->category_name = $request->category_name;
        $cat->category_slug = Str::of($request->category_name)->slug('-');
        $cat->save();
        //__toaster alert notification for the controller
       $notification = array(
        'message' => 'Category Added Successfully!',
        'alert-type' => 'success'
    );
    return redirect()->back()->with($notification);
       
    }
    //_____category.destroy____/
    public function destroy($id)
    {
        // $id = $request->hidden;
       $category = Category::find($id);
       $category->delete();
        //__toaster alert notification for the controller
       $notification = array(
        'message' => 'Category Deleted Successfully!',
        'alert-type' => 'warning'
    );
    return redirect()->back()->with($notification);
       
    }
}
