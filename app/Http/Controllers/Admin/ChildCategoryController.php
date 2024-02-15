<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChildCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

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
                ->addColumn('action', function($row) {
                    $actionbtn = '<a href="javascript:void(0)"  data-id="{{$row->id}}" class="btn btn-primary edit" data-bs-target="#editModal" data-bs-toggle="modal" >
                <i class="fas fa-edit"></i>
              </a>
              <a href="'.route('childcategory.destroy',$row->id).'" id="delete_data" class="btn btn-danger">
              <i class="fas fa-trash"></i>
            </a>';
                    return $actionbtn;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view ('admin.childcategories.index');
    }
     //_____childcategory.destroy___/
     public function destroy($id)
     {
         $child = ChildCategory::find($id)->first();
         $child->delete();
         return response()->json('Childcategory Deleted!');
     }
}
