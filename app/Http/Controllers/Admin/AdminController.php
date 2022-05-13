<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Utils\SystemUtils;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    public function index()
    {   


        return view('admin.index');
    }

    public function showProfile(){
     
    // $id = Auth::id();
    $id=5;
        $user= DB::table('users')
            ->join('admins', 'users.id', '=', 'admins.user_id')
           
            ->select('users.*', 'admins.*')
            ->where('id',$id)
            ->first();
       
       

       return view('admin.admin_profile.show_profile');
    }

    public function editProfile(){
        $id = Auth::id();
       $user= DB::table('users')
            ->join('admins', 'users.id', '=', 'admins.user_id')
           
            ->select('users.*', 'admins.*')
            ->where('id',$id)
            ->first();
        

        return view('admin.admin_profile.edit_profile');
    }

    public function doUpdata(Request $request)
    {
        $user=new User();
       
        //$user->email=$request->email;
        $user->phone=$request->phone;
        //$user->password=$request->password;
        $user->name=$request->name;
        $user->save();
    }
    public function doUpdataImage(Request $request)
    {   
       
        $userAvater= SystemUtils::updateAvatar($request);
        
        User::where('id', '=', 1)->update(['avater' => $userAvater]);
       
    }

    public function updatePassword(Resquest $requset)
    {
        if(Hash::check($requset['password'],Auth::user()->password))
        {
       
       $userDate = DB::table('users') 
       ->where('id',1)
       ->update(['password' =>Hash::make($requset['new-password'])]);
       return (Hash::make($requset['new-password']));
      
     }
     else{
       return '  كلمة السر خطا  ';
      }
}

public function updateEmail(Request $request)
{   
  $request->validate(['email' => 'required|email'],[
   'email.required'=>'يجب ادخال الايميل ',
   'email.email'=>'يجب ادخال الايميل بشكل الصحيح '
]);   

 if (DB::table('users')->where('email', $request->email)->exists())
 {
   return back()->with("الايميل موجود بالفعل");
}
 $number=rand ( 10000 , 99999 );

 $email_data = [
'name' => Auth::user()->name,
'activation_code' => $number
  ];
$Userid = 24;
    $affected = DB::table('users')
  ->where('id', $Userid)
  ->update([
        'remember_token' => $number]); 
  Mail::to($request->email)->send(new UpdateEmail($email_data));
  return 'لقد تم ارسال رمز التحقق الى البريد المدخل';
}
public function checkUpdateEmail(Request $request)
{
// $id = Auth::id();
$id=24;
if (DB::table('users')->where([['remember_token',$request['numberCode']], ['id', $id]] )->exists()) {
$userDate = DB::table('users')
->where('users.id',$id)
->update(['email' =>$request['email']]);

}
else{
return back()->with('  رمز التحقق خطاء ');
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

// public function updateEmail(Request $request)
// {
//   $number=rand ( 10000 , 99999 );
  
//   $email_data = [
//     'name' => 'Osama',
//     'activation_code' => $number
// ];
// $Userid = 24;
// $affected = DB::table('users')
//    ->where('id', $Userid)
//    ->update([
//              'remember_token' => $number]); 
// Mail::to($request->email)->send(new UpdateEmail($email_data));
// }
// public function checkUpdateEmail(Request $request)
// {
//   // $id = Auth::id();
//   $id=24;
//   if (DB::table('users')->where([['remember_token',$request['numberCode']], ['id', $id]] )->exists()) {
//     $userDate = DB::table('users')
//     ->where('users.id',$id)
//     ->update(['email' =>$request['email']]);
   
// }
// else{
//   return back()->with('  رمز التحقق خطاء ');
// }    
// }



}
