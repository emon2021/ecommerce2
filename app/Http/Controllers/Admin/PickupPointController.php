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

    //____pickup.point.index___________
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

    //____pickup.point.store_______
    public function store(Request $request)
    {
        $request->validate([
            'pickup_point_name' => 'required|unique:pickup_points,pickup_point_name',
            'pickup_point_address' => 'required',
            'pickup_point_phone' => 'required|max:11|numeric',
            'another_phone' => 'max:11|numeric',
        ]);

        $pickup = new PickupPoint();
        $inputs = $request->all();
        $pickup->fill($inputs);
        $pickup->save();

        return response()->json('Pickup Point has been added successfully!');
    }

    //____pickup.point.destroy_______
    public function destroy($id)
    {
        $pickup = PickupPoint::findOrfail($id);
        $pickup->delete();

        return response()->json('Pickup Point has been deleted successfully!');
    }

    //____pickup.point.edit_______
    public function edit($id)
    {
        $pickup = PickupPoint::findOrfail($id);

        return view('admin.pickup_point.edit',compact('pickup'));
    }
}
