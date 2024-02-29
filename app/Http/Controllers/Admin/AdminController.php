<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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

    //__change.password.view__//
    public function changeView()
    {
        return view('admin.auth.changePassword');
    }

    //__password.changed__//
    public function change_pass(Request $request)
    {
        $request->validate([
            'old_pass' => 'required',
            'password' => 'required|min:8|confirmed'
        ]);
        $old = Auth::user()->password;
        $new = $request->old_pass;
        if(Hash::check($new, $old))
        {
            $id = $request->hidden_id;
            $user = User::findOrfail($id);
            $user->password = Hash::make($request->password);
            $user->update();
            Auth::logout();
            return redirect()->route('admin.loginView');
        }else{
            return response()->json('Password Mismatched!');
        }
    }

}
