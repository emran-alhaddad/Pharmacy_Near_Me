<?php

namespace App\Http\Controllers\Auth\Social;

use App\Http\Controllers\Auth\Register\RegisterController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Auth\Login\LoginController;
use App\Utils\ErrorMessages;
use App\Utils\SuccessMessages;

class FacebookController extends Controller
{
    //

    public function redirect()
    {
        return Socialite::driver('facebook')->redirect()
            ->withCookie(cookie('is_pharmacy', false, 5));
    }

    public function redirectPharmacy()
    {
        return Socialite::driver('facebook')->redirect()
            ->withCookie(cookie('is_pharmacy', true, 5));
    }

    public function callback()
    {
        try {

            $user = Socialite::driver('facebook')->user();
            $userCheck = User::where(function ($query) use ($user) {
                $query->where('facebook_id', $user->id)
                    ->orWhere('email', $user->email);
            })->first();

            if ($userCheck) {
               
                if(!$userCheck->email_verified_at)
                return redirect()->route('login')->with('error', ErrorMessages::EMAIL_VERIFY);

                Auth::login($userCheck, $remember = true);
                return LoginController::checkrole(Auth::user());
               
            } else {

                $is_pharmacy = Cookie::get('is_pharmacy');
                $reg = new RegisterController();
                $user = $reg->createUser(
                    [
                        'name' => $user->name,
                        'email' => $user->email,
                        'password' => '123456789',
                        'password_confirmation' => '123456789',
                        'facebook_id' => $user->id,
                        'user_type' => $is_pharmacy ? "pharmacy" : "client"
                    ]
                );
                
                Auth::login($user);
                return LoginController::checkrole(Auth::user());
            }
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', $e->getMessage());

        }
    }

 

}
