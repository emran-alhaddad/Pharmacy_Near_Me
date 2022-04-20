<?php

namespace App\Http\Controllers\Auth\Login;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
//use Illuminate\Http\LoginUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{   

   

    public function doLogin(Request  $request)
    { 
        Validator::validate($request->all(),[
            'email'=>['email','required'],
            'password'=>['required']


        ],[
            'email.required'=>'this field is required please Enter your Email',
            'password.required'=>'this field is required please Enter your password',
            'email.email'=>'this field must be email format', 
           
        ]);

        if(Auth::attempt(['email'=>$request->email_username ,'password'=>$request->user_pass]))
        {

            
            // if(Auth::user()->hasRole($type))
            if(Auth::user()->hasRole('admin'))
            return view('show-admin-profile');
           elseif (Auth::user()->hasRole('client'))
            return view('show-client-profile');
            elseif (Auth::user()->hasRole('pharmacy'))
             return view('show-pharmacy-profile'); 
           
            
        }
        else 
          return 'show-login';
    }
    public function login()
    {
        return view('show-login');
    }
}
