<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 

class PharController extends Controller
{
    //
    public function showPhars(){
        $phar = DB::table('pharmacies')
        ->join('users', 'users.id', '=', 'pharmacies.user_id')
        ->join('zones', 'zones.id', '=', 'pharmacies.zone_id')
        ->join('cities', 'cities.id', '=', 'zones.city_id')
        ->select('users.*', 'zones.name AS Zname', 'cities.name AS Cname')
        ->get();
        //dd( $users);
        return view('admin.Phars.show_Phars')->with('phar',$phar);
    }

    public function addPhars(){
        return view('admin.Phars.add_Phars');
    }

    public function editPhars($id){
        
        $users = DB::table('pharmacies')
        ->join('users', 'users.id', '=', 'pharmacies.user_id')
        ->join('zones', 'zones.id', '=', 'pharmacies.zone_id')
        ->join('cities', 'cities.id', '=', 'zones.city_id')
        ->select('users.*', 'zones.name AS Zname','pharmacies.license', 'cities.name AS Cname')
        ->where('pharmacies.user_id',$id)
        ->get();
      


        return view('admin.Phars.edit_Phars');

    }
  
    public function delete($id)
    {
        $deleted = DB::table('pharmacies')->where('pharmacies.user_id',$id)->delete();
        DB::table('users')->where('id',$id)->delete();
        
    }
    public function Doupdate(Request $request,$id)
    {
        $affected = DB::table('users')
              ->where('id', $id)
              ->update([ 'email' => $request->email,
              'name' => $request->name,
              'avater'=>$request->avater,]);

              $affected = DB::table('pharmacies')
              ->where('user_id', $id)
              ->update(['zone_id' => $request->zone,
              'license' => $request->license,
              // 'address' =>$request->address,
              ]
              );      

    }

    public function create(Request $request)
    {
        $id=DB::table('users')->insertGetId([
            'email' => $request->email,
            'name' => $request->name,
            'avater'=>$request->avater,
         ]);
        $id=DB::table('pharmacies')->insertGetId([
            'zone_id' => $request->zone,
            'license' => $request->license,
            // 'address' =>$request->address,
            'user_id'=>$id,
        ]);


    }

      

}
