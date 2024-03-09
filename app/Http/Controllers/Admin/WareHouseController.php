<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WareHouse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class WareHouseController extends Controller
{
    //___check authentication___
    public function __construct()
    {
        $this->middleware(['auth','is_admin']);
    }

    //_______warehouse.index___________
    public function  index(Request $request)
    {
        if ($request->ajax()) {
            $data = WareHouse::select('id','warehouse_name','warehouse_address','warehouse_phone')->get();
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $actionbtn = '<a href="javascript:void(0)"  data-id="' . $row->id . '" class="btn btn-primary edit" data-bs-target="#editModal" data-bs-toggle="modal" >
                <i class="fas fa-edit"></i>
              </a>
              <a href="' . route('warehouse.destroy',$row->id) . '" id="delete_data" class="btn btn-danger">
              <i class="fas fa-trash"></i>
            </a>';
                    return $actionbtn;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.warehouse.index');
    }

    //___________warehouse.store__________
    public function store(Request $request){
       $request->validate([
           'warehouse_name'=>'required|string|max:255|unique:ware_houses,warehouse_name',
           'warehouse_address'=>'required|string|max:255',
           'warehouse_phone'=>'required|numeric'
        ]);

        $get_data = $request->all();
        $warehouse = new WareHouse();
        $warehouse->warehouse_slug = Str::slug($request->warehouse_name,'-');
        $warehouse->fill($get_data);
        $warehouse->save();

        return response()->json('Warehouse  Added Successfully!');
    }

    //________warehouse.destroy_________
    public function destroy($id)
    {
        $warehouse = WareHouse::findOrfail($id);
        $warehouse->delete();

        return response()->json("Warehouse Deleted Successfully!");
    }
       

}
