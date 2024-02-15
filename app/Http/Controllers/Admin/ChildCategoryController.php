<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class ChildCategoryController extends Controller
{
    //____childcategory.index to view data with yajra DataTables_____
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = ChildCategory::leftJoin('categories', 'categories.id', '=', 'child_categories.category_id')
                ->leftJoin('sub_categories', 'sub_categories.id', '=', 'child_categories.subcategory_id')
                ->select('child_categories.*', 'categories.category_name', 'sub_categories.subcategory_name')
                ->get();
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $actionbtn = '<a href="javascript:void(0)"  data-id="{{$row->id}}" class="btn btn-primary edit" data-bs-target="#editModal" data-bs-toggle="modal" >
                <i class="fas fa-edit"></i>
              </a>
              <a href="' . route('childcategory.destroy', $row->id) . '" id="delete_data" class="btn btn-danger">
              <i class="fas fa-trash"></i>
            </a>';
                    return $actionbtn;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        $category = Category::all();
        return view('admin.childcategories.index', compact('category'));
    }
    //  fetching the subcategory using ajax
    public function fetch_sub(Request $request)
    {
        $id = $request->id;
        $sub = SubCategory::select('id', 'subcategory_name')
            ->where('category_id', $id)
            ->get();
        //  return view in another file for displaying subcategory
        return view('admin.childcategories.subcategory',compact('sub'));
    }

    //  childcategory.store
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'childcategory_name' => 'required|unique:child_categories',
        ]);
        $child_cat = new ChildCategory();
        $child_cat->category_id = $request->category_id;
        $child_cat->subcategory_id = $request->subcategory_id;
        $child_cat->childcategory_name = $request->childcategory_name;
        $child_cat->childcategory_slug = Str::slug($request->childcategory_name,'-');
        $child_cat->save();
        
        return response()->json('Child Category Inserted!');

    }

    //_____childcategory.destroy___/
    public function destroy($id)
    {
        $child = ChildCategory::find($id)->first();
        $child->delete();
        return response()->json('Childcategory Deleted!');
    }
}
