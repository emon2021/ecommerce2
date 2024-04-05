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
        return view('admin.categories.index', $data);
    }

    //_____category.store ___/
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

    //______category.edit______/
    public function edit($id)
    {
        $category = Category::findOrfail($id); //__always use findOrfail() method for ajax.
        return response()->json($category);
    }

    //_____category.update___/
    public function update(Request $request)
    {
        //_____validated____/
        $request->validate([
            'category_name' => 'required|unique:categories',
        ]);
        //_____data update to category table____/
        $id = $request->id;
        $cat = Category::where('id', $id)->first();
        $cat->category_name = $request->category_name;
        $cat->category_slug = Str::of($request->category_name)->slug('-');
        $cat->update();
        //__toaster alert notification for the controller
        $notification = array(
            'message' => 'Category Updated Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    //_________category.home.page.showing____________
    public function home_page($id)
    {
        $home_page = Category::findOrfail($id);
        if ($home_page->home_page == 1) {
            $home_page->home_page = 2;
            $home_page->update();
        } else {
            $home_page->home_page = 1;
            $home_page->update();
        }
        return back();
    }
}
