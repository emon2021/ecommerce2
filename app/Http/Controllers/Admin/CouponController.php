<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CouponController extends Controller
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
            $data = Coupon::select('id','coupon_code','coupon_type','coupon_amount','coupon_valid_date','coupon_status')->get();
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
        return view('admin.offers.coupon.index');
    }
    //______store data in database________________
    public function store(Request $request)
    {
        //  request  and rule validation
        $request->validate([
            'coupon_code' => 'required|unique:coupons,coupon_code',
            'coupon_type' => 'required',
            'coupon_amount' => 'required',
            'coupon_valid_date' => 'required',
        ]);

        // ________insert data into the table__________
        $coupon = new Coupon();
        $coupon->coupon_code = $request->coupon_code;
        $coupon->coupon_type = $request->coupon_type;
        $coupon->coupon_amount = $request->coupon_amount;
        $coupon->coupon_valid_date = $request->coupon_valid_date;
        $coupon->coupon_status = $request->coupon_status;
        $coupon->save();

        return response()->json('Coupon has been added successfully!');
    }
}
