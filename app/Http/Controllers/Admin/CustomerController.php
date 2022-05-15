<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use App\Models\User;
use App\Mail\UpdateEmail;
use App\Utils\SystemUtils;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

use App\Http\Controllers\Auth\Register\RegisterController;
use Illuminate\Support\Facades\Validator;
class CustomerController extends Controller
{
    //
    public function showCustomers(){
        $customers = DB::table('clients')
        ->join('users', 'users.id', '=', 'clients.user_id')
        ->select('users.*', 'clients.*')
        ->get();

        return view('admin.Customer.show_Customers')->with('customers',$customers);
    }

    public function activity($id,$state)
    {
        $affected=DB::table('users')
        ->where('id', $id)
        ->update(['is_active'=>$state]);
        if($affected>0 && $state==0)
        {
            return back()->with('status','تم توقيف المستخدم ');
        }
        elseif($affected>0 && $state==1)
        return back()->with('status','  تم تفعيل المستخدم ');
        else  return back()->with('error','  حدث خطاء الرجاء اعادة المحاولة');

    }

    public function delete($id)
    {
        $deleted = DB::table('clients')->where('user_id',  $id)->delete();
        $deleted = DB::table('users')->where('id',  $id)->delete();
        if($deleted>0)
        {
            return back()->with('secuss','تم حذف المستخدم ');
        }
        return back()->with('secuss',' لم يتم حذف المستخدم ');


    }

    public function addCustomers(){
        return view('admin.Customer.add_Customers');
    }

    public function editCustomers($id){
        $customer = DB::table('clients')
        ->join('users', 'users.id', '=', 'clients.user_id')
        ->select('users.*', 'clients.*')
        ->where('clients.user_id',$id)
        ->first();
        // return  $customer;


        return view('admin.Customer.edit_Customers')->with('customer',$customer);
       


        return view('admin.Customer.edit_Customers');
    }
    public function doUpdate(Request $request,$id)
    {   
          //return $request;
      $request->validate(['name' => 'required|min:3'],[
    
            'name.required'=>'يجب ادخال اسم الصيدلية ',
            'name.min'=>'يجب ان يكون الاسم 3 احرف',

        ]);

         User::where('id', '=', $id)->update(array('name' => $request->name));



        if($request->has('gender'))

        {
            Client::where('user_id', '=', $id)->update(array('gender' => $request->gender));
        }
        if($request->filled('address'))
        {
            $this->checkAddress($request,$id);
        }

        if($request->filled('dob'))
        {
            $this->checkDob($request,$id);
        }

        if($request->filled('phone'))
        {
            $this->checkPhone($request,$id);
        }
      
        return back()->with('status', 'لقد تم تعديل المستحدم بنجاح');

    }

    public function create(Request $request)
    {  
        $user=new RegisterController();
        $user=$user->createUser($request->all());
        if($request->filled('address'))
        {
            $this->checkAddress($request,$user->id);
        }

        if($request->has('gender'))
        {
            Client::where('user_id', '=', $user->id)->update(array('gender' => $request->gender));
        }
        if($request->filled('dob'))
        {
            $this->checkDob($request,$user->id);
        }

        if($request->filled('phone'))
        {
            $this->checkPhone($request,$user->id);
        }
        if($request->hasFile('avater')){

            $name=SystemUtils::updateAvatar($request,'client');
  
            User::where('id', '=', $user->id)->update(array('avater' =>$name ));
  
         }


    }


    public function updateEmail(Request $request,$id) 
{
    $request->validate(['email' => 'required|email'],[
        'email.required'=>'يجب ادخال الايميل ',
        'email.email'=>'يجب ادخال الايميل بشكل الصحيح '
     ]);

    if (DB::table('users')->where('email', $request->email)->exists())
    {
        return back()->with('error',"الايميل موجود بالفعل");
    }
  $number=rand ( 10000 , 99999 );

  $email_data = [
    'name' => Auth::user()->name,
    'activation_code' => $number
];

$affected = DB::table('users')
   ->where('id', $id)
   ->update([
             'remember_token' => $number]);
Mail::to($request->email)->send(new UpdateEmail($email_data));
return back()->with(['status'=>"تم ارسال رمز التحقق الى بريدك الجديد",'email'=>$request->email]);

}
public function checkUpdateEmail(Request $request,$id)
{
  // $id = Auth::id();
  
  if (DB::table('users')->where([['remember_token',$request['numberCode']], ['id', $id]] )->exists()) {
    $userDate = DB::table('users')
    ->where('users.id',$id)
    ->update(['email' =>$request['email']]);
    if($userDate)
    return back()->with('status',"تم تعديل الايميل بنجاح");
    return back()->with('error',"لم تم تعديل الايميل بنجاح  حدث خطاء!!");


}
else{ 
  return back()->with('error','  رمز التحقق خطاء ');
}
}
public function doUpdataImage(Request $request)
{

    $userAvater= SystemUtils::updateAvatar($request,"avaters/client");

    User::where('id', '=', 1)->update(['avater' => $userAvater]);

}
public function updatePassword(Request $requset,$id)
{   
    $requset->validate(['new-password' => 'required|min:9'],[
        'new-password.required'=>'يجب ادخال  كلمة السر  ',
        'new-password.min'=>'يجب ادخال كلمة السر طولها   '
     ]); 
    // return $requset;
     //Auth::user()->password

    if(Hash::check($requset['password'],Auth::user()->password))
    {
   
   $userDate = DB::table('users') 
   ->where('id',$id)
   ->update(['password' =>Hash::make($requset['new-password'])]);
   if($userDate)
   return back()->with('status','     تم تعديل كلمة السر بنجاح');
  

 }
 else{
    return back()->with('error','     تم تعديل كلمة السر بنجاح');
  }
}


public function checkAddress($request,$id)
{
 $request->validate(['address' => 'min:4'],[
   'address.min'=>'يجب ان يكون  العنوان اربع احرف او اكثر'
]);
Client::where('user_id', '=', $id)->update(array('address' => $request->address));
}

public function checkDob($request,$id)
{
 $request->validate(['dob' => 'before:today'],[
   'dob.before'=>'يجب ادخال تاريخ الصحيح'
]);
Client::where('user_id', '=', $id)->update(array('dob' => $request->dob));
}

public function checkPhone($request,$id)
{
    $request->validate(['phone' => 'numeric|min:9'],[
        'phone.min'=>'يجب ان يكون رقم الهاتف 9',
        'phone.numeric'=>'يجب ان يكون رقم الهاتف  ارقام'
     ]);
User::where('id', '=', $id)->update(array('phone' => $request->phone));
} 


}
