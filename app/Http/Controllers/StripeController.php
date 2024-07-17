<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class StripeController extends Controller
{
    public function stripe(Request $request)
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_PAYMENT_SK'));

        $response = $stripe->checkout->sessions->create([
            'line_items' => [
                [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => Cart::content()->first()->name,
                    ],
                    'unit_amount' => Cart::total() * 100,
                ],

                'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('payment.success').'?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('payment.cancel'),
        ]);
        
        if(isset($response->id) && $response->id != '' )
        {
            return redirect($response->url);
        }else{
            return redirect()->route('payment.cancel');
        }
    }
    
    //  payment.success
    public function success(Request $request)
    {
        if(isset($request->session_id))
        {
            return response()->json([
                'message' => 'Payment success',
            ]);
        }else{
            return redirect()->route('payment.cancel');
        }
    }

    //  payment.cancel
    public function cancel()
    {
        return response()->json([
            'message' => 'Payment canceled',
        ]);
    }
}
