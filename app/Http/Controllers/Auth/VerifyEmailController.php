<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Auth\Login\LoginController;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Utils\ErrorMessages;
use App\Utils\SuccessMessages;
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
            $user->remember_token = null;
            $user->save();
            if(!$user->is_active)  
            return redirect()->route('login')->with([
                'error'=>ErrorMessages::EMAIL_ACTIVATE,
                'status' => SuccessMessages::EMAIL_ACTIVATION_SUCCESS
            ]);

            Auth::login($user);
            return LoginController::checkrole($user);
        }
        else
        return redirect()->route('register')->with('error',ErrorMessages::EMAIL_VERIFY_EXPIRED);
    }
}
