<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //_____auth check_____
    public function __construct() 
    {
        $this->middleware(['auth' , 'is_admin']);
    }

    //_______product.create________
    public function create()
    {
        return view( "admin.products.create");
    }
}
