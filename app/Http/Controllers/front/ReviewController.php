<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    //  add review 
    public function addReview(Request $request, $product_id)
    {
        $request->validate([
            'rating' => 'required',
            'comment' => 'nullable',
        ]);

        $review = new Review();
        $review->user_id = Auth::id();
        $review->product_id = $product_id;
        $review->rating = $request->rating;
        $review->comment = $request->comment;
        $review->author = $request->author;
        $review->email = $request->email;
        $review->review_date = date('d-m-Y');
        $review->review_month = date('F');
        $review->review_year = date('Y');
        $review->save();

        //__toaster alert notification for the controller
        $notification = array(
            'message' => 'Thank you for your review!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    //  add product to wishlist
    public function wishlist($id)
    {
        if (Auth::check()) {
            $user_id = Auth::id();
            $product_id = $id;
            $check = DB::table('wishlists')->where('user_id', $user_id)->where('product_id', $product_id)->first();
            if ($check == false) {
                $data = array();
                $data['user_id'] =  $user_id;
                $data['product_id'] = $product_id;
                $insert = DB::table('wishlists')->insert($data);
                if ($insert == true) {
                    $count_wishlist = DB::table('wishlists')->where('user_id', $user_id)->count();

                    return response()->json($count_wishlist);
                }
            } else {
                return response()->json('This product is already exist to the wishlist!');
            }
        } else {
            return response()->json('loginForm');
        }
    }

    //  view wishlist page
    public function index()
    {
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $wishlists = DB::table('products')
                ->leftJoin('wishlists', 'products.id', 'wishlists.product_id')
                ->select('products.*', 'wishlists.id as wishlist_id')
                ->where('wishlists.user_id', $user_id)
                ->get();
            return view('frontend.pages.wishlist',compact( 'wishlists'));
        }else{
            return redirect()->route('login.showForm');
        }
    }
    // remove from wishlist
    public function wishlist_destroy($id)
    {
        if(Auth::check())
        {
            // dd($id);
            $destroy = DB::table('wishlists')->where('id',$id)->delete();
            if($destroy){
                
                $count_wishlist = DB::table('wishlists')->where('user_id', Auth::id())->count();
                if($count_wishlist>=0)
                {
                    return response()->json($count_wishlist);
                }

                return response()->json('Product has been removed from your Wishlist Successfully !');
            }
        }else{
            return response()->json('showLoginForm');
        }
    }
}
