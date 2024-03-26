<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
