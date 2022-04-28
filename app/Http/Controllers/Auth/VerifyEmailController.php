<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Auth\Login\LoginController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyEmailController extends Controller
{
    public function verify($token)
    {
        $user = User::where('remember_token',$token)->first();
        if($user)
        {
            $user->email_verified_at = Carbon::now()->timestamp;
            $user->save();
            Auth::login($user);
            return LoginController::checkrole($user);
        }
        else
        return redirect()->route('forget-password')->with('error','انتهت صلاحية رابط التفعيل هذا ');
    }
}
