<?php

namespace App\Http\Controllers\Auth\Social;

use App\Http\Controllers\Auth\Register\RegisterController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Laravel\Socialite\Facades\Socialite;

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
            $userCheck = User::where('facebook_id', $user->id)->first();
            if ($userCheck) {
                if (Auth::user()->hasRole('admin'))
                    return redirect()->route('admin-profile');

                elseif (Auth::user()->hasRole('client'))
                    return redirect()->route('client-profile');

                elseif (Auth::user()->hasRole('pharmacy'))
                    return redirect()->route('pharmacy-profile');
            } else {

                // return  redirect('dashboard')->with(['user' => $user]);
                $is_pharmacy = Cookie::get('is_pharmacy');
                $reg = new RegisterController();
                $reg->createUser(
                    [
                        'name' => $user->name,
                        'email' => $user->email,
                        'password' => '123456dummy',
                        'password_confirmation' => '123456dummy',
                        'facebook_id' => $user->id,
                        'user_type' => $is_pharmacy ? "pharmacy" : "client"
                    ]
                );
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

 

}
