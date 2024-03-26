<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //__admin.home.login____//
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $is_admin = User::select('is_admin')->where('email', $request->email)->first();
        if ($is_admin->is_admin == 1) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                if (auth()->user()->is_admin == 1) {
                    return redirect()->route('admin.home');
                } else {
                    return redirect()->route('home.page');
                }
            } else {
                return redirect()->back()->with('error', 'Invalid Credential!');
            }
        } else {
            return redirect()->route('login.showForm');
        }
    }
}
