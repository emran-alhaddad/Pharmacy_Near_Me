<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Utils\SystemUtils;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Utils\ErrorMessages;
use App\Utils\SuccessMessages;
// use App\Http\Controllers\Register\RegisterController;
use Illuminate\Support\Facades\Validator;
use App\Models\Pharmacy;
use App\Models\User;
use App\Models\Complaint;
use App\Http\Controllers\Admin\CitiesController;
use App\Http\Controllers\Auth\Register\RegisterController;
use App\Http\Controllers\Admin\ZonesController;
use App\Mail\UpdateEmail;
use Illuminate\Support\Facades\Mail;
// App\Mail\UpdateEmail
class PharController extends Controller
{
    //
        public function showPhars(){
        $phar = DB::table('pharmacies')
        ->join('users', 'users.id', '=', 'pharmacies.user_id')
        ->join('zones', 'zones.id', '=', 'pharmacies.zone_id')
        ->join('cities', 'cities.id', '=', 'zones.city_id')
        ->select('users.*', 'zones.name AS Zname','pharmacies.*' ,'cities.name AS Cname')
        ->get();
         
        return view('admin.Phars.show_Phars')->with('phars',$phar);
    } 

    public function addPhars(){
      
        return view('admin.Phars.add_Phars')->with(['city'=>CitiesController::getCity(),'zone'=>ZonesController::getZone()]);
    }

    public function showPharsAlert($id){
      $phar = DB::table('pharmacies')
      ->join('users', 'users.id', '=', 'pharmacies.user_id')
      ->join('zones', 'zones.id', '=', 'pharmacies.zone_id')
      ->join('cities', 'cities.id', '=', 'zones.city_id')
      ->select('users.*', 'zones.name AS Zname','pharmacies.*' ,'cities.name AS Cname')
      ->where('users.id',$id)
      ->get();
      return view('admin.Phars.show_Phars')->with('phars',$phar);
    }


    public function activity($id,$state)
    {
        $affected=DB::table('users')
        ->where('id', $id)
        ->update(['is_active'=>$state]);
        if($affected && $state==0)
        return back()->with('status','تم تعطيل حساب الصيدلية');
        else 
        return back()->with('status','تم تفعيل حساب الصيدلية');
        return back()->with('error','حدث  خطاء اثناء تعطيل حساب الصيدلية');
        
    }
    public function editPhars($id){

        $phar = DB::table('pharmacies')
        ->join('users', 'users.id', '=', 'pharmacies.user_id')
        ->join('zones', 'zones.id', '=', 'pharmacies.zone_id')
        ->join('cities', 'cities.id', '=', 'zones.city_id')
        ->select('users.*', 'zones.id AS Zid','pharmacies.*', 'cities.id AS Cid')
        ->where('pharmacies.user_id',$id)
        ->first();
       // return CitiesController::getCity();

    

        return view('admin.Phars.edit_Phars')->with(['phar'=>$phar,'city'=>CitiesController::getCity(),'zone'=>ZonesController::getZone()]);

    }

    public function delete($id)
    {
        $deleted = DB::table('pharmacies')->where('pharmacies.user_id',$id)->delete();
        DB::table('users')->where('id',$id)->delete();
        if($deleted>0)
        {
            return back()->with('status','تم حذف الصيدلية ');
        }
        return back()->with('error',' لم يتم حذف الصيدلية ');

    }
    // public function Doupdate(Request $request,$id)
    // {
    //     $affected = DB::table('users')
    //           ->where('id', $id)
    //           ->update([ 'email' => $request->email,
    //           'name' => $request->name,
    //           'avater'=>$request->avater,]);

    //           $affected = DB::table('pharmacies')
    //           ->where('user_id', $id)
    //           ->update(['zone_id' => $request->zone,
    //           'license' => $request->license,
    //           // 'address' =>$request->address,
    //           ]
    //           );

    // }


    public function doUpdata(Request $request,$id)
    {

     
        $request->validate(['name' => 'required|min:3'],[

            'name.required'=>'يجب ادخال اسم الصيدلية '
         ]);
         
         $this->checkPhone($request,$id);
         User::where('id', '=', $id)->update(['name' =>$request->name]);
        $this->checkSocialMieda($request,$id);
        if($request->filled('address'))
        {
        $this->checkAddress($request,$id);
        }
         return back()->with('status','تم تعديل الصيدلية بنجاح');

    }
    public function doUpdataImage(Request $request)
    {  
      return $request;
        $userAvater= SystemUtils::updateAvatar($request,'avaters/pharmacy');

        $effect=User::where('id', '=',$request->id )->update(['avater' => $userAvater]);
        if($effect)
        {
          return back()->with('status','تم تعديل لوجو الصيدلية  بنجاح');
        }
        return back()->with('error',' لم تم تعديل لوجو الصيدلية  بنجاح');

    }

    public function doUpdataLicense(Request $request)
    {  
   
      
        $pharLicense= SystemUtils::insertLicense($request,'license');

        $effect= Pharmacy::where('user_id', '=',$request->id )->update(['license' => $pharLicense]);
      
        if($effect)
        {
          return back()->with('status','تم تعديل الرخصة الصيدلية  بنجاح');
        }
        return back()->with('error',' لم تم تعديل الرخصة الصيدلية  بنجاح');

    }

    public function updatePassword(Request $requset)
    {

        // $requset->validate(['password' => 'required|min:9'],[
        //     'password.required'=>'يجب ادخال  كلمة السر  ',
        //     'password.min'=>'يجب ادخال كلمة السر طولها   '
        //  ]);


        if(Hash::check($requset['password'],Auth::user()->password))
         {
            $requset->validate(['new-password' => 'required|min:9'],[
            'password.required'=>'يجب ادخال  كلمة السر  ',
            'password.min'=>'يجب ادخال كلمة السر طولها   '
         ]);


        $userDate = DB::table('users')
        ->where('id',1)
        ->update(['password' =>Hash::make($requset['new-password'])]);
        return (Hash::make($requset['new-password']));

      }
      else{
        return '  كلمة السر خطا  ';
       }
}


    public function create(Request $request)
    {

         $user=new RegisterController();
        // $user=$user->createUser($request->all());
        // $this->validateFields($request);
        // $user = new User();
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = Hash::make($request->password);
        // $user=new RegisterController();
         $user=$user->createUser($request->all());
        $this->checkSocialMieda($request,$user->id);

        if($request->has('zone'))
         {
            Pharmacy::where('user_id', '=', $user->id)->update(array('zone_id' => $request->zone));
         }

        if($request->hasFile('license')){

            $name=SystemUtils::insertLicense($request,'license');

            Pharmacy::where('user_id', '=', $user->id)->update(array('license' =>$name ));

         }
         if($request->hasFile('avatar')){

          $name=SystemUtils::updateAvatar($request,'avaters/pharmacy');

          User::where('id', '=', $user->id)->update(array('avater' =>$name ));

       }
         if($request->filled('address'))
        {
            $this->checkAddress($request,$user->id);
        }

        if($request->filled('description'))
        {
            $this->checkDescription($request,$user->id);
        }
        return back()->with('status','تم انشاء الصيدلية بنجاح');
    }

    public function updateEmail(Request $request)
     {   
       
    //    $request->validate(['email' => 'required|email'],[
    //     'email.required'=>'يجب ادخال الايميل ',
    //     'email.email'=>'يجب ادخال الايميل بشكل الصحيح '
    //  ]);   
    // if (!$this->validateEmail($request))
    // return back()->withErrors([
    //     'email' => ErrorMessages::EMAIL_SAME,
    //     'modal' => 'edit-email'
    // ]);
   
      if (DB::table('users')->where('email', $request->email)->exists())
      {
        // return back()->with("الايميل موجود بالفعل");
        return ['type' => 'danger', 'data' => "11الايميل موجود بالفعل"];
     }
      $number=rand ( 10000 , 99999 );
  
      $email_data = [
     'name' => $request->name,
     'activation_code' => $number
       ];
   
         $update = DB::table('users')
       ->where('id', $request->id)
       ->update([
             'remember_token' => $number]);
            
       
             if ($update) {
              Mail::to($request->email)->send(new UpdateEmail($email_data));
               return ['type' => 'success', 'data' => SuccessMessages::EMAIL_CODE_SEND_SUCCESS];
          } else
              return ['type' => 'danger', 'data' => ErrorMessages::EMAIL_CODE_SEND_FAILED];
      //  Mail::to($request->email)->send(new UpdateEmail($email_data));
      //  return 'لقد تم ارسال رمز التحقق الى البريد المدخل';
}
public function checkUpdateEmail(Request $request)
  {
  // $id = Auth::id();
  //  $id=24;
  if (DB::table('users')->where([['remember_token',$request['numberCode']], ['id', $request->id]] )->exists()) {
    $affected = DB::table('users')
    ->where('users.id',$request->id)
    ->update(['email' =>$request['email']]);
    if($affected)
    {
      return back()->with(['status' => SuccessMessages::EMAIL_UPDATED_SUCCESS]);
    }
    else
    {
      return back()->withErrors([
        'code' => ErrorMessages::INVALID_EMAIL_CODE,
        'modal' => 'edit-email'
    ]);
    }
   
  }
  else{
 // return back()->with('  رمز التحقق خطاء ');
 return back()->withErrors([
  'code' => 'رمز التحقق خطاء ',
  'modal' => 'edit-email'
]);
  }    
  } 

   public function checkSocialMieda($request,$id)
   {

    if($request->filled('facebook'))
    {    $this->validationFacebook($request,$id);

   }

   if($request->filled('twitter'))
   {

    $this->validationTwitter($request,$id);
   }
   if($request->filled('google'))
   {
       $this->validationGoogle($request,$id);
   }

}
  public function validationFacebook($request,$id)
  {
    Validator::validate($request->all(),
    ['facebook' => ['url'] ],

   ['facebook.url'=>'يجب ادخال رابط الفيسبوك بطريقة صحيحة']
);
Pharmacy::where('user_id', '=', $id)->update(array('facebook' => $request->facebook));
// validateFacebook();
  }

  public function validationTwitter($request,$id)
  {
    Validator::validate($request->all(),
    ['twitter' => ['url'] ],

   ['twitter.url'=>'يجب ادخال رابط التويتر بطريقة صحيحة']);

Pharmacy::where('user_id', '=', $id)->update(array('twitter' => $request->twitter));

  }

  public function validationGoogle($request,$id)
  {
    Validator::validate($request->all(),
    ['google' => ['url'] ],

   ['google.url'=>'يجب ادخال رابط جوجل بطريقة صحيحة']
);

Pharmacy::where('user_id', '=', $id)->update(array('google' => $request->google));

  }
 public function checkAddress($request,$id)
 { if($request->filled('address')){
  $request->validate(['address' => 'min:4'],[
    'address.min'=>'يجب ان يكون  العنوان اربع احرف او اكثر'
 ]);
 Pharmacy::where('user_id', '=', $id)->update(array('address' => $request->address));
  }
}
public function checkPhone($request,$id)
{ if($request->filled('phone')){
 $request->validate(['phone' => 'numeric|min:9'],[
   'phone.min'=>'يجب ان يكون رقم الهاتف 9',
   'phone.numeric'=>'يجب ان يكون رقم الهاتف  ارقام'
]);
User::where('id', '=', $id)->update(array('phone' => $request->phone));
}
}
  public function checkDescription()
  {
    if($request->filled('description')){
      $request->validate(['description' => 'min:10'],[
        'description.min'=>'يجب ان يكون رقم الهاتف 9',
        'description.numeric'=>'يجب ان يكون رقم الهاتف  ارقام'
     ]);
     User::where('id', '=', $id)->update(array('description' => $request->description));
     }
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
