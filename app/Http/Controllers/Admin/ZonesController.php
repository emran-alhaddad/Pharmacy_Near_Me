<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\zone;
class ZonesController extends Controller
{
    //

    public function showZones(){
        $zon=new zone();
        $zon=$zon->get();
       // dd($city);
        return view('admin.Zones.show_Zones');
    }

    public function addZones(){
        return view('admin.Zones.add_Zones');
    }

    public function editZones($id){
        $zon=new zone();
        $zon=$zon->where('id',2)->get();
        return view('admin.Zones.edit_Zones');
    }


    public function doUpdate(Request $request,$id)
    {
        $affected = DB::table('zones')
     ->where('id', $id)
     ->update([
               'name' => $request->name,
               'city_id'=>$request->city_id
               
     ]);     
    }
    public function create( Request $request)
    {
        $id=DB::table('zones')->insertGetId([
            'name' => $request->name,
            'city_id'=>$request->city_id,
        ]);
    
    }
    public function delete($id)
    {
        $deleted = DB::table('zones')->where('id',  $id)->delete();
        
    }
}
