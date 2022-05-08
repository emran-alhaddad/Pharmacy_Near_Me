<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Utils\ErrorMessages;
use App\Utils\SuccessMessages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgetPasswordController extends Controller
{
    public function index()
    {
        return view('auth.forget-password');
    }

    public function create(Request $request)
    {
        $request->validate(['email' => 'required|email'], [
            'email.required' => "البريد الألكتروني يجب ألا يكون فارغا",
            'email.email' => "صيغة البريد الإلكتروني غير صحيحة"
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => SuccessMessages::RESET_PASSWORD_SEND])
            : back()->with(['error' => ErrorMessages::EMAIL_NOT_FOUND]);
    }
}
