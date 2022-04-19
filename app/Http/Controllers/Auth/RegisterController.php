<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Client;
use App\Models\Pharmacy;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {

        $this->validateFields($request);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        if ($request->has('user_type')) {
            switch ($request->user_type) {
                case 'client':
                    return $this->registerClient($user, $request);
                case 'pharmacy':
                    return $this->registerPharmacy($user, $request);
                default:
                    return "<h1 style='color:red'>Access Denied !!!</h1>";
            }
        } else
            return "<h1 style='color:red'>Access Denied !!!</h1>";
    }

    private function registerClient(User $user)
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

    private function registerPharmacy(User $user)
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

    private function registerAdmin(User $user)
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
