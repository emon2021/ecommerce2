<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SocialAuthController extends Controller
{
    // google login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try{
            $google_user = Socialite::driver('google')->user();
            $user = User::where('google_id', $google_user->getId())->first();

            if($user){
                Auth::login($user);
                return redirect()->route('home.page');
                
            }else{
                User::create([
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId(),
                ]);

                $new = User::where('google_id', $google_user->getId())->first();
                Auth::login($new);
                return redirect()->route('home.page');
            }
            
        }catch(\Exception $e){
            Log::error($e->getMessage());
        }
    }
}
