<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class authController extends Controller
{
     public function adminLogin()
   {
      return view('auth.admin.admin_login');
       //  return "login admin Page";
     }

     public function userLogin()
     {
        return view('auth.user.user_login');
         
       }
       public function pharmasticLogin()
       {
          return view('auth.pharmacist.pharmacist_login');
          
         }

/**signup */
      
      
           public function userSignup()
           {
              return view('auth.user.user_login');
               
             }
             public function pharmasticSignup()
             {
                return view('auth.pharmacist.pharmistic_signup');
                
               }

/**reset password */



public function adminReset_password()
{
   return view('auth.admin.reset_password.blade');
    //  return "login admin Page";
  }

  public function userReset_password()
  {
     return view('auth.user.reset_password.blade');
      
    }
    public function pharmasticReset_password()
    {
       return view('auth.pharmacist.reset_password.blade');
       
      }

   
}
