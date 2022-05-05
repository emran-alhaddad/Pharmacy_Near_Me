<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index()
    {   
        $id = Auth::id();
        $user= DB::table('users')
            ->join('clients', 'users.id', '=', 'clients.user_id')
           
            ->select('users.*', 'clients.*')
            ->where('id',$id)
            ->get();
       // return $user;
    }
    public function  UpdatePersonalDate( Request $request )
    {
        $id = Auth::id();
        $userDate = DB::table('users')
        ->where('id', $id)
        ->update(['name' =>$request->name,
                  'phone' =>$request->phone,
                  'avater' =>$request->avater,
                  ]
              );
              $clientDate = DB::table('clients')
              ->where('id', $id)
              ->update(['dob' =>$request->dob,
                        'address' =>$request->address,
                        'gender' =>$request->gender,
                        ]
                    );
        return view('user-form update');
    }

    public function update()
    {
        return view('forms ');
    }
    public function updatePassword(Resquest $requset)
    {
      $id = Auth::id();
      if (DB::table('users')->where([['password',Hash::make($request['password'])], ['id', $id]] )->exists()) {
        $userDate = DB::table('users')
        ->update(['password' =>Hash::make($request['password'])])
        ->where('id',$id);
    }
    else{
      return back()->with('كلمة السر خطا ');
    }
        // $id = Auth::id();
        // $userDate = DB::table('users')
        
        // ->where([
        //         ['id', $id],
        //         [Hash::make($request['password'])] 
        //         ]    
        //     )->get();
        //     if($userDate==null)
        //     return back()->with('كلمة السر خطا ');
        //     else
        //     {
        //         $userDate = DB::table('users')
        //         ->update(['password' =>Hash::make($request['password'])])
        //         ->where('id',$id);

        //     }



    }
    

  public function selectPharamcy($id)
  {
     
     
    $user= DB::table('users')
        ->join('pharmacies', 'users.id', '=', 'pharmacies.user_id')
        ->join('zones', 'zones.id', '=', 'pharmacies.zone_id')
       
        ->join('cities', 'zones.city_id', '=', 'cities.id')
       
        ->select('users.*', 'pharmacies.*','zones.name As Zname','cities.name As Cname')
        ->where('pharmacies.user_id',$id)
        ->get();
     dd( $user);         
  }

  public function requestIndex()
  {
    //return view('request.index');
  }
  
  // public function RequestInWaitAccespt()
  // {
  //   $userID=22;
  //   $user= DB::table('request__details')
  //       ->join('requests', 'request__details.request_id', '=', 'requests.id')
  //       ->join('pharmacies', 'requests.pharmacy_id', '=', 'pharmacies.user_id')
       
  //       ->join('users', 'users.id', '=', 'pharmacies.user_id')
  //       ->select('users.name', 'requests.*','request__details.*')
       
  //       ->where('requests.client_id',$userID)
  //       ->get();
  //     return $user;
    
  //   //return view('request.index');
  // }  

  
  // public function request2()
  // {
  //   $userID=22;
  //   $user= DB::table('request__details')
  //       ->join('requests', 'request__details.request_id', '=', 'requests.id')
  //       ->join('pharmacies', 'requests.pharmacy_id', '=', 'pharmacies.user_id')
       
  //       ->join('users', 'users.id', '=', 'pharmacies.user_id')
  //       ->join('replies', 'replies.request_id', '=', 'requests.id')
       
  //       ->join('reply__details', 'reply__details.reply_id', '=', 'replies.id')
       

  //       ->select('users.name', 'requests.*','request__details.*','replies.*','reply__details.*')
       
  //       ->where('requests.client_id',$userID)
  //       ->whereColumn('request__details.id','=','reply__details.request_details_id')
  //       ->get();
  //     dd($user);
  // }

  public function updateEmail()
  {
    
  }

}
