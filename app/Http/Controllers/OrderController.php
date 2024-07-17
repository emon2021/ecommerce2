<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
        
       $exist = Order::where('user_id', auth()->user()->id)->first();
       
        if(!$exist)
        {
            $request->validate([
                'name' => 'required|min:3|max:100',
                'email' => 'required|email|max:255',
                'phone' => 'required|max:11|min:11',
                'address' => 'required',
                'city' => 'required',
                'state' => 'required',
                'postcode' => 'required|max:6|min:6',
                'notes' => 'nullable',
                'country_name' => 'required',
                'company_name' => 'nullable',
    
            ]);
            
            Order::Create([
                'user_id' => auth()->user()->id,
                'product_id' => $request->product_id,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'postcode' => $request->postcode,
                'notes' => $request->notes,
                'payment_method' => $request->stripe_card,
                'payment_status' => 'pending',
                'country_name' => $request->country_name,
                'company_name' => $request->company_name,
            ]);
        }else{
            return redirect()->route('payment.stripe');
        }

        return redirect()->route('payment.stripe');
    }
}
