<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //__admin.home.index__//
    public function index()
    {
        return view('admin.admin-home');
    }
    //__admin.home.loginView____//
    public function loginView()
    {
        //___if user is logged in then redirect them back___/
        if(Auth::check()==true)
        {
            return redirect()->route('admin.home');
        }
        return view('admin.auth.login');
    }
    
    //__admin.home.logout___//
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.loginView');
    }
}
