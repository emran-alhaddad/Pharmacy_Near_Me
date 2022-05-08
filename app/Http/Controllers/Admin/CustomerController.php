<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use App\Http\Controllers\Register\RegisterController;
use Illuminate\Support\Facades\Validator;
class CustomerController extends Controller
{
    //
    public function showCustomers(){
        $users = DB::table('clients')
        ->join('users', 'users.id', '=', 'clients.user_id')
        ->select('users.*', 'clients.*')
        ->get();
       
        return view('admin.Customer.show_Customers');
    }

    public function activity($id,$state)
    {
        DB::table('users')
        ->where('id', $id)
        ->update(['is_active'=>$state]);
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
        $users = DB::table('clients')
        ->join('users', 'users.id', '=', 'clients.user_id')
        ->select('users.*', 'clients.*')
        ->where('clients.user_id',$id)
        ->get();
        //dd($users);


        return view('admin.Customer.edit_Customers');
    }
    public function doUpdate(Request $request,$id)
    {   

      $request->validate(['name' => 'required|min:3'],[
    
            'name.required'=>'يجب ادخال اسم الصيدلية ',
            'name.min'=>'يجب ان يكون الاسم 3 احرف',
            
         ]);

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
public function doUpdataImage(Request $request)
{   
   
    $userAvater= SystemUtils::updateAvatar($request);
    
    User::where('id', '=', 1)->update(['avater' => $userAvater]);
   
}
public function updatePassword(Resquest $requset)
{   
    $requset->validate(['new-password' => 'required|min:9'],[
        'new-password.required'=>'يجب ادخال  كلمة السر  ',
        'new-password.min'=>'يجب ادخال كلمة السر طولها   '
     ]); 

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
Client::where('user_id', '=', $id)->update(array('phone' => $request->phone));
} 


}
