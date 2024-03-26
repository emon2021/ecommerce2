<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    //  show login form
     public function showForm()
     {
        return view('user_login.login');
     }
     // show register form
     public function showRegister()
     {
        return view('user_login.register');
     }

     //     register user
     public function register(Request $request)
     {
        $request->validate([
            'fname' => 'required|min:3',
            'lname' => 'required|min:3', 
            'email' => 'required|email|unique:users,email',
            'password'=>'required|min:6|confirmed'
        ]);

        //  insert data into database
        $user = new User();
        $user->name = $request->fname. " ". $request->lname ;
        $user->email= $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        
        Auth::attempt(['email'=>$request->email,'password'=>$request->password]);
        if (Auth::check()) {
           return response()->json('Register Success and Logged In');
       }else{
        return response()->json('Login failed');
       }
     }
     // login user
     public function login(Request $request)
     {
        $request->validate([
            'email' => 'required|email',
            'password'=>'required|min:6'
        ]);
    $is_admin = User::select('is_admin')->where('email',$request->email)->first();
    if($is_admin->is_admin == null)
            {
            if (Auth::attempt(['email'=>$request->email,'password'=>$request->password])) 
            {
                return redirect()->intended(route('home.page'));
            }else{
                return redirect()->back()->with('loginError','Invalid Credential!');
            }
    }else{
        return redirect()->route('admin.loginView');
    }
     }

     //  logout user
     public function logout()
     {
        if(Auth::check())
        {
            Auth::logout();
            return redirect(route("login.showForm"));
        }
     }
   
}
