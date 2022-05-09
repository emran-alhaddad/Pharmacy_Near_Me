<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Utils\ErrorMessages;
use App\Utils\SuccessMessages;
use Carbon\Carbon;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function show($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ], [
            'email.required' => "البريد الألكتروني يجب ألا يكون فارغا",
            'token.required' => "التوكن المرسلة غير صحيحة",
            'password.required' => "كلمة المرور يجب ألا تكون فارغة",
            'email.email' => "صيغة البريد الإلكتروني غير صحيحة",
            'password.min' => "يجب ألا يقل طول كلمة السر عن 8 احرف  ",
            'password.confirmed' => "يجب أن يتطابق هذا الحقل مع كلمة المرور",

        ]);

        if (!User::where('email', $request->email)->first())
            return back()->with(['error' => ErrorMessages::EMAIL_NOT_FOUND]);

        $token_exist = DB::table('password_resets')
            ->where('email', $request->email)
            ->first();
        if (!$token_exist)
            return redirect()->route('login')->with(['error' => ErrorMessages::TOKEN_EXPIRED]);

        if (!Password::tokenExists(User::where('email', $request->email)->first(), $request->token))
            return back()->with(['error' => ErrorMessages::TOKEN_NOT_FOUND]);



        try {
            $status = Password::reset(
                $request->only('email', 'password', 'password_confirmation', 'token'),
                function ($user, $password) {
                    $user->forceFill([
                        'password' => Hash::make($password)
                    ])->setRememberToken(Str::random(60));

                    $user->email_verified_at = Carbon::now()->timestamp;
                    $user->save();
                    event(new PasswordReset($user));
                }
            );

            return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', SuccessMessages::PASSWORD_RESET_SUCCESS)
                : back()->with(['error' => [__($status)]]);
        } catch (\Exception $th) {
            return redirect()->route('forget-password')->with(['error' => ErrorMessages::TOKEN_EXPIRED]);
        }
    }
}
