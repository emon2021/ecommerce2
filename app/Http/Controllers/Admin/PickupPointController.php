<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PickupPoint;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PickupPointController extends Controller
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
            $data = PickupPoint::select('id','pickup_point_name','pickup_point_address','pickup_point_phone','another_phone')->get();
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $actionbtn = '<a href="javascript:void(0)"  data-id="' . $row->id . '" class="btn btn-primary edit" data-bs-target="#editModal" data-bs-toggle="modal" >
                <i class="fas fa-edit"></i>
              </a>
              <a href="' . route('pickup.point.destroy',$row->id) . '" id="delete_data" class="btn btn-danger">
              <i class="fas fa-trash"></i>
            </a>';
                    return $actionbtn;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.pickup_point.index');
    }
}
