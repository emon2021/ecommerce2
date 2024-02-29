<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    // brand.index
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $brands = Brand::all();
            return DataTables::of($brands)
                ->addColumn('action', function ($row) {
                    $actionbtn = '<a href="javascript:void(0)"  data-id="'.$row->id.'" class="btn btn-primary edit" data-bs-target="#editModal" data-bs-toggle="modal" >
                <i class="fas fa-edit"></i>
              </a>
              <a href="'.route('brand.destroy',$row->id).'" id="delete_data" class="btn btn-danger">
              <i class="fas fa-trash"></i>
            </a>';
                    return $actionbtn;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.brands.index');
    }

    //  brand.store
    public function store(Request $request)
    {
        
        $request->validate([
            'brand_name'=>'required|unique:brands',
            'brand_logo'=>'required|image|max:800',
        ]);
        
        $brand = new Brand();
        $brand->brand_name = $request->brand_name;
        $brand->brand_slug = Str::slug($request->brand_name,'-');
        //  file upload
        if(($request->file('brand_logo'))==true)
        {
            $logo = $request->file('brand_logo');
            $extension = $logo->getClientOriginalExtension();
            $logo_name = 'public/backend/brand_logo/'.md5(uniqid()).'.'.$extension;
            $path = 'public/backend/brand_logo/';
            $logo->move($path,$logo_name);
            $brand->brand_logo = $logo_name;
            
        }else{
            return response()->json('Please choose Logo!');
        }
        $brand->save();
        return response()->json('Brand Successfully Added!');
    }
    //_____childcategory.destroy___/
    public function destroy($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        //  delete image from folder
        if(File::exists($brand->brand_logo)){
            File::delete($brand->brand_logo);
        }
        return response()->json('Brand Deleted!');
    }
}
