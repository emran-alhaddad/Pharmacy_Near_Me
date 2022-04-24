<?php

namespace App\Http\Controllers\Auth\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Socialite;
use Exception;
use Auth;
use Validator;

class FacebookController extends Controller
{
    //

    public function show()
    {
        return view('auth.login');
    }
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function login()
    {
        try {
    
            
            $user = Socialite::driver('facebook')->user();
         
        
            $isUser = User::where('facebook_id', $user->id)->first();
     
            if($isUser){
                
                if(Auth::user()->hasRole('admin'))
                    return 'show-admin-profile';
               elseif (Auth::user()->hasRole('client'))
                   return 'show-client-profile';
                elseif (Auth::user()->hasRole('pharmacy'))
                   return 'show-pharmacy-profile';
            }
            else{
               return  redirect('dashboard')->with(['user' => $user]);
                }
    
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }

 

}
