<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerifyEmail;
use App\Models\User;
use App\Utils\ErrorMessages;
use App\Utils\SuccessMessages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class ResendEmailController extends Controller
{
    public function index()
    {
        return view('auth.resend-email_activation');
    }
    public function send(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        if(!$user) 
        return  back()->with('error', ErrorMessages::EMAIL_NOT_FOUND);

        $token = Str::uuid();
            $user->remember_token = $token;
            $email_data = [
                'name' => $user->name,
                'activation_url' => URL::to('/') . '/auth/verify_email/' . $token
            ];

            Mail::to($request->email)->send(new VerifyEmail($email_data));
            $user->update();
            return  back()->with('status', SuccessMessages::EMAIL_RESEND_SUCCESS);
       
    }
}
