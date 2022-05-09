<?php

namespace App\Http\Controllers\Register;

use App\Http\Controllers\Auth\Login\LoginController;
use App\Http\Controllers\Controller;
use App\Mail\VerifyEmail;
use App\Models\Admin;
use App\Models\Client;
use App\Models\Pharmacy;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index()
    {
        if (Auth::check()) return LoginController::checkrole(Auth::user());
        return view('auth.register');
    }

    public function create(Request $request)
    {
        $this->validateFields($request);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        if (!$request->has('email_verified_at')) {
            $token = Str::uuid();
            $user->remember_token = $token;
            $email_data = [
                'name' => $user->name,
                'activation_url' => URL::to('/') . '/auth/verify_email/' . $token
            ];
        }


        if ($request->has('user_type')) {
            switch ($request->user_type) {
                case 'client':
                    $this->registerClient($user, $request);
                    break;
                case 'pharmacy':
                    $this->registerPharmacy($user, $request);
                    break;
                default:
                
                    return back()->with('error', "حدث خطأ غير متوقع ... لم نتمكن من تسجيل حسابك !! يرجى المحاولة مرة أخرى");
            }

            if (!$request->has('email_verified_at'))
                Mail::to($request->email)->send(new VerifyEmail($email_data));
            return  redirect()->route('login')->with('error', 'لقد تم ارسال رابط تفعيل الحساب الى الايميل الخاص بك ');
        } else
        
            return back()->with('error', "حدث خطأ غير متوقع ... لم نتمكن من تسجيل حسابك !! يرجى المحاولة مرة أخرى");
    }

    public  function createUser(array $request)
    {
        $user = new User();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $token = Str::uuid();
        $user->remember_token = $token;

        if (isset($request['google_id'])) 
        { $user->google_id = $request['google_id'];
        $user->email_verified_at = Carbon::now()->timestamp;

        }
        else if (isset($request['facebook_id'])) {
            $user->facebook_id = $request['facebook_id'];
        $user->email_verified_at = Carbon::now()->timestamp;
        }
        else{
            $request2 =new Request($request);
            RegisterController::validateFields($request2);

            $email_data = [
                'name' =>  $request['name'],
                'activation_url' => URL::to('/') . '/auth/verify_email/' . $token
            ];
            Mail::to($request['email'])->send(new VerifyEmail($email_data));
        }

        switch ($request['user_type']) {
            case 'client':
                return RegisterController::registerClient($user);
                break;
            case 'pharmacy':
                return RegisterController::registerPharmacy($user);
                break;
            default:
            return back()->with('error', 'عذا ... حدث خطأ غير متوقع .. لم نستطع انشاء حساب جديد لك ... يرجى المحاولة مرة اخرى');
        }
    }


    // Private Functions
    public static function registerClient(User $user)
    {
        $user->is_active = 1;
        if ($user->save()) {
            $user->attachRole('client');
            Client::create([
                'user_id' => $user->id,
            ]);

            return $user;
        }
    }

    public static function registerPharmacy(User $user)
    {
        $user->is_active = 0;
        if ($user->save()) {
            $user->attachRole('pharmacy');
            Pharmacy::create([
                'user_id' => $user->id,
            ]);
            return $user;
        }
    }

    public static function registerAdmin(User $user)
    {
        $user->is_active = 1;
        if ($user->save()) {
            $user->attachRole('admin');
            Admin::create([
                'user_id' => $user->id,
            ]);
            return redirect()->route('admin-dashboard');
        }
    }

    public  function validateFields(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255|email',
            'password' => 'required|min:8'
        ]);
    }
}