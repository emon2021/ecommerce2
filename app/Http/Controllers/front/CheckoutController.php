<?php

namespace App\Http\Controllers\front;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //  create.checkout
    public function create()
    {
        return view('frontend.pages.checkout');
    }
}
