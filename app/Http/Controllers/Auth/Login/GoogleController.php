<?php

namespace App\Http\Controllers\Auth\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GoogleController extends Controller
{
    //

    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }
    public function login()
    {
        try {
    
            
            $user = Socialite::driver('google')->user();
         
        
            $isUser = User::where('google_id', $user->id)->first();
     
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
