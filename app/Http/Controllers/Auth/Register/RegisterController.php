<?php

namespace App\Http\Controllers\Auth\Register;

use App\Http\Controllers\Controller;
use App\Mail\VerifyEmail;
use App\Models\Admin;
use App\Models\Client;
use App\Models\Pharmacy;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index()
    {
        return view('welcome');
        // return view('Auth.register');
    }

    public function create(Request $request)
    {
        $res = "";
        $this->validateFields($request);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $token = Str::uuid();
        $user->remember_token = $token;

        $email_data = [
            'name' => $user->name,
            'activation_url' => URL::to('/').'/auth/verify_email/'.$token
        ];

        
        if ($request->has('user_type')) {
            switch ($request->user_type) {
                case 'client':
                    $res =  $this->registerClient($user, $request);
                    break;
                case 'pharmacy':
                    $res =  $this->registerPharmacy($user, $request);
                    break;
                default:
                    return "<h1 style='color:red'> Access Denied  Unknown User Type!!!</h1>";
            }
            Mail::to($request->email)->send(new VerifyEmail($email_data));
            return $res;
        } else
            return "<h1 style='color:red'>Access Denied !!!</h1>";
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
            
            return "<h1>Client Registered Success</h1>";
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
            return "<h1>Pharmacy Registered Success</h1>";
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
            return "<h1>Admin Registered Success</h1>";
        }
    }

    private function validateFields(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255|email',
            'password' => 'required|max:255|confirmed'
        ]);
    }
}
