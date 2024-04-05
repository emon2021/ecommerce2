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
            'brand_logo'=>'required|image|max:800|mimes:jpg,jpeg,png,gif,svg,webp',
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

    //brand.destroy___/
    public function destroy($id)
    {
        if(isset($id))
        {
            $brand = Brand::find($id);
            $brand->delete();
            //  delete image from folder
            if(File::exists($brand->brand_logo)){
                File::delete($brand->brand_logo);
            }
        }
        return response()->json('Brand Deleted!');
    }

    //  brand.edit
    public function edit($id)
    {
        $brand = Brand::findOrfail($id);
        return view('admin.brands.edit',compact('brand'));

    }

    //  brand.update
    public function update(Request $request)
    {
        $request->validate([
            'brand_name' => 'required',
            'brand_logo' => 'required|max:800',
        ]);

        //  current brand id
        $id = $request->hidden_id;
        //  find current editable row
        $brand = Brand::findOrfail($id);
        $brand->brand_name = $request->brand_name;
        $brand->brand_slug = Str::slug($request->update_brand,'-');
        //  file upload
        if(($request->file('brand_logo'))==true)
        {
            if(File::exists($brand->brand_logo))
            {
                //  delete exist image at first
                File::delete($brand->brand_logo);

                //  then insert with new image
                $logo = $request->file('brand_logo');
                //  getting image original extension
                $extension = $logo->getClientOriginalExtension();
                //  make image name
                $logo_name = 'public/backend/brand_logo/'.md5(uniqid()).'.'.$extension;
                //  image uploading path
                $path = 'public/backend/brand_logo/';
                //   image upload here
                $logo->move($path,$logo_name);
                $brand->brand_logo = $logo_name;
            }else{
                //  if image doesn't exist
                $logo = $request->file('brand_logo');
                $extension = $logo->getClientOriginalExtension();
                $logo_name = 'public/backend/brand_logo/'.md5(uniqid()).'.'.$extension;
                $path = 'public/backend/brand_logo/';
                $logo->move($path,$logo_name);
                $brand->brand_logo = $logo_name;
            }
            
        }else{
            return response()->json('Please choose Logo!');
        }
        $brand->update();
        return response()->json('Brand Successfully updated!');
    }


}
