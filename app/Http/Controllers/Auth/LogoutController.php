<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class LogoutController extends Controller
{
    //Logout user 
   public function logout()
   {
    Auth::logout();
    return redirect()->route('login');
   }
}
