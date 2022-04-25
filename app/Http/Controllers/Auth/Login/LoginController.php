<?php

namespace App\Http\Controllers\Auth\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use  App\Models\User;

class LoginController extends Controller
{

    public function doLogin(Request  $request)
    {
        Validator::validate($request->all(),[
            'email'=>['email','required'],
            'password'=>['required']
        ]);
        $user = User::where('email','=',$request->email)->first();

        if($user->email_verified_at && Auth::attempt(['email'=>$request->email ,'password'=>$request->password , 'is_active' => 1]))
        {  
        return LoginController::checkrole(Auth::user());
        }
        else
          return 'show-Register';
    }
    public function login()
    {
        
        return view('auth.login');
    }

    public static function checkrole($user)
    {   
       
        
        if ($user->hasRole('admin'))
        return redirect()->route('admin-profile');

    elseif ($user->hasRole('client')) 
    return redirect()->route('client-profile');
      

    elseif ($user->hasRole('pharmacy'))
        return redirect()->route('pharmacy-profile');
   

        
    }
}
