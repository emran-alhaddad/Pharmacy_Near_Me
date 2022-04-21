<?php

namespace App\Http\Controllers\Auth\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{



    public function doLogin(Request  $request)
    {
        Validator::validate($request->all(),[
            'email'=>['email','required'],
            'password'=>['required']
        ]);

        if(Auth::attempt(['email'=>$request->email ,'password'=>$request->password]))
        {
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
        return "Login Page";
        // return view('show-login');
    }
}
