<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class authController extends Controller
{
     public function adminLogin()
   {
      return view('auth.login');
       //  return "login admin Page";
     }

     public function userLogin()
     {
        return view('auth.login');
         
       }
       public function pharmasticLogin()
       {
          return view('auth.login');
          
         }

/**signup */
      
      
           public function userSignup()
           {
              return view('auth.register');
               
             }
             public function pharmasticSignup()
             {
                return view('auth.register');
                
               }

/**forget password */



public function adminForget_password()
{
   return view('auth.forget-password');
    //  return "login admin Page";
  }

  public function userForget_password()
  {
     return view('auth.forget-password');
      
    }
    public function pharmasticForget_password()
    {
       return view('auth.forget-password');
       
      }

   /**reser password */

   public function adminReset_password()
   {
      return view('auth.reset-password');
       //  return "login admin Page";
     }
   
     public function userReset_password()
     {
        return view('auth.reset-password');
         
       }
       public function pharmasticReset_password()
       {
          return view('auth.reset-password');
          
         }
   

}
