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
        Validator::validate($request->all(), [
            'email' => ['email', 'required'],
            'password' => ['required']
        ],[
            'email.required' =>"البريد الألكتروني يجب ألا يكون فارغا",
            'password.required' =>"كلمة المرور يجب ألا تكون فارغة",
            'email.email' => "صيغة البريد الإلكتروني غير صحيحة"
        ]);
        
        $user = User::where('email', '=', $request->email)->first();

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if ($user->email_verified_at) {
                if (!$user->is_active) {
                    Auth::logout();
                    return back()->with('error', 'حسابك يحتاج تفعيل من مدير الموقع اضغط على الرابط التالي لتقديم طلب الى مدير الموقع');
                }

                return LoginController::checkrole($user);
            } else {
                Auth::logout();
                return back()->with('error', 'يجب عليك اولا تأكيد البريد الألكتروني عن طريق الضغط على الرابط المرسل الى بريدك الالكتروني');
            }
        } else {
            return back()->with('error', 'بيانات الدخول غير صحيحة !!');
        }
    }

    public function login()
    {
        if (Auth::check()) return $this->checkrole(Auth::user());
        return view('auth.login');
    }

    public static function checkrole($user)
    {

        if ($user->hasRole('admin'))
            return redirect()->route('admin-dashboard');

        elseif ($user->hasRole('client'))
            return redirect()->route('client-dashboard');


        elseif ($user->hasRole('pharmacy'))
            return redirect()->route('pharmacy-dashboard');
    }
}
