<?php

namespace App\Http\Controllers\Auth\Register;

use App\Http\Controllers\Auth\Login\LoginController;
use App\Http\Controllers\Controller;
use App\Mail\VerifyEmail;
use App\Models\Admin;
use App\Models\Client;
use App\Models\Pharmacy;
use App\Models\User;
use App\Utils\ErrorMessages;
use App\Utils\SuccessMessages;
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
                
                    return back()->with('error',ErrorMessages::REGISTER_FAILD);
            }

            if (!$request->has('email_verified_at'))
                Mail::to($request->email)->send(new VerifyEmail($email_data));
            return  redirect()->route('login')->with('status',SuccessMessages::EMAIL_VERIFY_SEND);
        } else
        
            return back()->with('error', ErrorMessages::REGISTER_FAILD);
    }

    public function createUser(array $request)
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
        elseif (isset($request['facebook_id']))
        { $user->facebook_id = $request['facebook_id'];
            $user->email_verified_at = Carbon::now()->timestamp;
          
        }  
        else{ 
            $requestObj=new Request($request); 
              $this->validateFields($requestObj);
            if (!$requestObj->has('email_verified_at')) {
               
                $user->remember_token = $token;
                $email_data = [
                    'name' => $user->name,
                    'activation_url' => URL::to('/') . '/auth/verify_email/' . $token
                ];
            }
            if (!$requestObj->has('email_verified_at'))
            Mail::to($requestObj->email)->send(new VerifyEmail($email_data));
            

             

        }

        // $token = Str::uuid();
        // $user->remember_token = $token;

        switch ($request['user_type']) {
            case 'client':
                return $this->registerClient($user);
                break;
            case 'pharmacy':
                return $this->registerPharmacy($user);
                break;
            default:
            return back()->with('error', ErrorMessages::REGISTER_FAILD);
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

    private function validateFields(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:5|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'confirmed' => 'same:password'
        ],[
            'name.required' => "الأسم يجب ألا يكون فارغا",
            'email.required' =>"البريد الألكتروني يجب ألا يكون فارغا",
            'password.required' =>"كلمة المرور يجب ألا تكون فارغة",
            'name.string' => "الأسم يجب أن يكون نص",
            'name.min' => "يجب ألا يقل طول الأسم عن 5 احرف  ",
            'name.max' => "يجب ألا يزيد طول الأسم عن 100 حرف  ",
            'email.email' => "صيغة البريد الإلكتروني غير صحيحة",
            'email.unique' =>"البريد الألكتروني هذا مسجل لدينا مسبقا ",
            'password.min' => "يجب ألا يقل طول كلمة السر عن 8 احرف  ",
            'confirmed.same' => "يجب أن يتطابق هذا الحقل مع كلمة المرور",

        ]);
    }
    

}
