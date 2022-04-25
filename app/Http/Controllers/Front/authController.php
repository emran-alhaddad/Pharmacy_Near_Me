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

/**forget password */



public function adminForget_password()
{
   return view('auth.admin.forget_password');
    //  return "login admin Page";
  }

  public function userForget_password()
  {
     return view('auth.user.forget_password');
      
    }
    public function pharmasticForget_password()
    {
       return view('auth.pharmacist.forget_password');
       
      }

   /**reser password */

   public function adminReset_password()
   {
      return view('auth.admin.resert_password');
       //  return "login admin Page";
     }
   
     public function userReset_password()
     {
        return view('auth.user.resert_password');
         
       }
       public function pharmasticReset_password()
       {
          return view('auth.pharmacist.resert_password');
          
         }
   

}
