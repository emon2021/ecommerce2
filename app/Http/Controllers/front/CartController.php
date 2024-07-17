<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //   product add to cart
    public function addToCart(Request $request)
    {
        $product = Product::findOrfail($request->cart_id);
        if ($product->discount_price == null || $product->discount_price == 0) {
            $price = $product->selling_price;
        } else {
            $price = $product->discount_price;
        }
        
        Cart::add([
                    'id' => $product->id,
                    'name' => $product->name,
                    'qty' => $request->cart_qty,
                    'price' => $price,
                    'options' => [
                        'size' => $request->cart_size, 
                        'color' => $request->cart_color, 
                        'thumbnail' => $product->thumbnail
                    ],
                ]);

        $cart_count = Cart::count();
        $cart_total = Cart::subtotal();
        return response()->json([
            'message' => 'Product added to cart successfully',
            'cart_count'=>$cart_count,
            'cart_total'=>$cart_total,
        ]);
    }

    //  shopping.cart.view
    public function cartView()
    {
        return view('frontend.pages.shopping-cart');
    }
    //  cart.product.update
    public function update(Request $request)
    {
        Cart::update($request->cart_id, [
            'qty' => $request->cart_qty,
            'options' => [
                'color' => $request->cart_color,
                'size' => $request->cart_size
            ]
        ]);

        $cart_count = Cart::count();
        $cart_total = Cart::total();
        $cart_subtotal = Cart::subtotal();
        
        return response()->json([
            'message'=>'Cart updated successfully!',
            'status'=>'success',
            'cart_count'=>$cart_count,
            'cart_total'=>$cart_total,
            'cart_subtotal'=>$cart_subtotal,
        ]);
    }
    //  cart.product.remove
    public function remove(Request $request,$id)
    {
        Cart::remove($id);
        $cart_count = Cart::count();
        $cart_total = Cart::total();
        $cart_subtotal = Cart::subtotal();
        return response()->json([
            'message'=>'Product removed from cart!',
            'status'=>'success',
            'cart_count'=>$cart_count,
            'cart_total'=>$cart_total,
            'cart_subtotal'=>$cart_subtotal,
        ]);
    }
}
