<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    //Logout user 
   public function logout()
   {
    Auth::logout();
    return redirect('logins');
   }
}
