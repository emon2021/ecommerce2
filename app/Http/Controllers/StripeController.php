<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
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
            session()->put('payment_id', $response->id);
            session()->put('user_id', auth()->user()->id);
            session()->put('payment_method', 'Stripe');
            session()->put('payment_status', 'paid');
            session()->put('amount', Cart::total());

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
            $pay = new Payment();
            $pay->create([
                'payment_id' => session()->get('payment_id'),
                'user_id' => session()->get('user_id'),
                'amount' => session()->get('amount'),
                'payment_method' => session()->get('payment_method'),
                'payment_status' => session()->get('payment_status'),
            ]);
            $order = Order::where('user_id', session()->get('user_id'))->first();
            $order->update([
                'payment_status' => 'paid',
            ]);

            //  clear cart
            Cart::destroy();
            
            $notification = array(
                'message' => 'Payment successful!',
                'alert-type' => 'success'
            );

            return redirect()->route('home.page')->with($notification);
        }else{
            
            return redirect()->route('payment.cancel');
        }
    }

    //  payment.cancel
    public function cancel()
    {
        $notification = array(
            'message' => 'Payment unsuccessful!',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }
}
