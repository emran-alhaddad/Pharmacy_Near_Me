<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Socialite;
use Exception;
use Auth;
class SocialController extends Controller
{   
CONST DRIVER_TYPE = 'facebook';
    
    public function show()
    {
        return view('auth.login');
    }
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function loginWithFacebook()
    {
        try {
    
            
            $user = Socialite::driver('facebook')->user();
        
            $isUser = User::where('remember_token', $user->token)->first();
     
            if($isUser){
                Auth::login($isUser);
                return 'login scessful';
            }else{
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    
                    'password' => encrypt('admin@123'),
                    'remember_token'=>$user->token
                ]);
    
                Auth::login($createUser);
                return 'login';
                }
    
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }
    
}