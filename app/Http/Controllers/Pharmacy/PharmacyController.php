<?php

namespace App\Http\Controllers\Pharmacy;

use App\Http\Controllers\Controller;
use App\Models\Pharmacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PharmacyController extends Controller
{
    public function index()
    {


        
        return view('pharmacy.account', [
            'pharmacy' => Pharmacy::with(['user', 'zone.city'])->where('user_id', Auth::user()->id)->first()
        ]);
    }


    public function edit_profile()
    {
        $client = User::with('client')->where('id', Auth::id())->firstOrFail();
        return view('user.edit_profile', ['user' => $client]);
    }


    // pharmacy views
    public function account()
    {
        return view('pharmacy.account.pharmacyAccunt');
    }
    public function settings()
    {
        return view('pharmacy.account.pharmacySettings');
    }
    public function orders()
    {
        return view('pharmacy.orders.manageOrders');
    }
    public function detailes()
    {
        return view('pharmacy.orders.orderDetailes');
    }
    public function chat()
    {
        return view('pharmacy.chat');
 
    }

    
    public function pharmacyShowAccount()
    {
        return view('pharmacy.account.pharmacyShowAccount');
 
    }

  // Update pharmacy Data
  public function  update(Request $request)
  {
      $this->validateClient($request);
      $id = Auth::id();
      $userData = DB::table('users')
          ->where('id', $id)
          ->update(
              [
                  'name' => $request->name,
                  'phone' => $request->phone,
              ]
          );

      if (!$userData)
          return back()->with('error', ErrorMessages::PROFILE_UPDATED_FAILED);


      $clientData = DB::table('clients')
          ->where('user_id', $id)
          ->update(
              [
                  'dob' => $request->dob,
                  'address' => $request->address,
                  'gender' => $request->gender,
              ]
          );

      if (!$clientData)
          return back()->with('error', ErrorMessages::PROFILE_UPDATED_FAILED);

      return back()->with('status', SuccessMessages::PROFILE_UPDATED_SUCCESS);
  }

  

  public function updatePassword(Request $request)
  {
      if (!$this->validatePassword($request))
          return back()->withErrors([
              'password' => ErrorMessages::WRONG_PASSWORD,
              'modal' => 'edit-password'
          ]);


      DB::table('users')
          ->where('id', Auth::id())
          ->update(['password' => Hash::make($request['new_password'])]);

      return back()->with(['status' => SuccessMessages::PASSWORD_UPDATE_SUCCESS]);
  }

  public function updateEmail(Request $request)
  {
      if (!$this->validateEmail($request))
          return back()->withErrors([
              'email' => ErrorMessages::EMAIL_SAME,
              'modal' => 'edit-email'
          ]);
      $id = Auth::id();
      if (DB::table('users')->where([['remember_token', $request['code']], ['id', $id]])->exists()) {
          DB::table('users')
              ->where('users.id', $id)
              ->update(['email' => $request['email']]);

          return back()->with(['status' => SuccessMessages::EMAIL_UPDATED_SUCCESS]);
      } else {
          return back()->withErrors([
              'code' => ErrorMessages::INVALID_EMAIL_CODE,
              'modal' => 'edit-email'
          ]);
      }
  }

  public function sendEmailCode(Request $request)
  {
      try {
          if ($request->email == Auth::user()->email)
              return ['type' => 'danger', 'data' => ErrorMessages::EMAIL_SAME];

          $number = rand(11111, 99999);
          $email_data = [
              'name' => Auth::user()->name,
              'activation_code' => $number
          ];

          $update = DB::table('users')
              ->where('id', Auth::id())
              ->update([
                  'remember_token' => $number
              ]);
          if ($update) {
              Mail::to($request->email)->send(new UpdateEmail($email_data));
              return ['type' => 'success', 'data' => SuccessMessages::EMAIL_CODE_SEND_SUCCESS];
          } else
              return ['type' => 'danger', 'data' => ErrorMessages::EMAIL_CODE_SEND_FAILED];
      } catch (\Exception $th) {
          return ['type' => 'danger', 'data' => ErrorMessages::EMAIL_CODE_SEND_FAILED];
      }
  }


  private function validatePassword(Request $request)
  {
      $password_match = Hash::check($request->password, auth()->user()->password);

      if (!$password_match)
          return false;


      $request->validate([
          'new_password' => 'required|min:8',
          'new_password_confirmed' => 'same:new_password'
      ], [
          'new_password.required' => "كلمة المرور يجب ألا تكون فارغة",
          'new_password.min' => "يجب ألا يقل طول كلمة السر عن 8 احرف  ",
          'new_password_confirmed.same' => "يجب أن يتطابق هذا الحقل مع كلمة المرور",
      ]);

      return true;
  }

  private function validateEmail(Request $request)
  {
      $request->validate([
          'email' => 'required|email|unique:users'
      ], [
          'email.required' => "البريد الألكتروني يجب ألا يكون فارغا",
          'email.email' => "صيغة البريد الإلكتروني غير صحيحة",
          'email.unique' => "البريد الألكتروني هذا مسجل لدينا مسبقا ",
      ]);

      if ($request->email == Auth::user()->email)
          return false;
      return true;
  }


}
