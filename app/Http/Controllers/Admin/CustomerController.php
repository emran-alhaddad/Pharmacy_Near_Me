<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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

    public function delete($id)
    {
        $deleted = DB::table('clients')->where('user_id',  $id)->delete();
        $deleted = DB::table('users')->where('id',  $id)->delete();
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
        $affected = DB::table('clients')
     ->where('user_id', $id)
     ->update(['email' => $request->descripe,
               'name' => $request->url,
               'avater' => $request->image,
     ]);

     $affected = DB::table('users')
     ->where('id', $id)
     ->update(['address' => $request->descripe,
               
     ]);
              
    }

    public function create(Request $request)
    {
        $id=DB::table('users')->insertGetId([
            'email' => $request->email,
            'name' => $request->name,
            'avater'=>$request->avater,
         ]);
        $id=DB::table('pharmacies')->insertGetId([
            'address' => $request->address,
            
            // 'address' =>$request->address,
            'user_id'=>$id,
        ]);

    }
}
