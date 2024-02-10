<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //__admin.home.index__//
    public function index()
    {
        return view('admin.admin-home');
    }
}
