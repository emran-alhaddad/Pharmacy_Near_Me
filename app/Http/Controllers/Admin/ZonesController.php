<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\zone;
use Illuminate\Support\Facades\DB;
class ZonesController extends Controller
{
    //

    public function showZones(){
         // $id = Auth::id();
    $id=5;
    $user= DB::table('zones')
        ->join('cities', 'cities.id', '=', 'zones.city_id')
       
        ->select('cities.name As Cname', 'zones.*')
        // ->where('id',$id)
        ->first();
        dd($user);
        
    }

    public function addZones(){
        return view('admin.Zones.add_Zones');
    }

    public function editZones($id){
       
        $id=5;
    $user= DB::table('zones')
        ->join('cities', 'cities.id', '=', 'zones.city_id')
       
        ->select('cities.name As Cname', 'zones.*')
         ->where('id',$id)
        ->first();
        // dd($user);
        return view('admin.Zones.edit_Zones');
    }


    public function doUpdate(Request $request,$id)
    {
        $this->checkName($request);
        $this->checkCity($request);
        $affectedRows = zone::where('id', $id)->update(['name' => $request->name,'city_id'=>$request->city_id]);
   
        if($affectedRows>0)
        {
            return back()->with('secuss','تم تعديل منطقة  ');
        }
        return back()->with('secuss',' لم تم تعديل منطقة ');

    }
    public function create( Request $request)
    {    
        $this->checkName($request);
        $this->checkCity($request);
        $id=DB::table('zones')->insertGetId([ 'name' => $request->name,'city_id'=>$request->city_id,]);
        if($id>0)
        {
            return back()->with('secuss','تم اضافة منطقة  ');
        }
        return back()->with('secuss',' لم تم اضافة منطقة ');
    
    }
    public function delete($id)
    {
        $deleted = DB::table('zones')->where('id',  $id)->delete();
        if($deleted>0)
        {
            return back()->with('secuss','تم حذف منطقة ');
        }
        return back()->with('secuss',' لم يتم حذف منطقة ');
    }
    
    public function checkName(Request $request)
   {
    $request->validate(['name' => 'required|min:2'],[
    
        'name.required'=>'يجب ادخال اسم المنطقة  '
     ]);
   }

   public function checkCity(Request $request)
   { 
    $request->validate(['city_id' => 'required'],[
    
        'city_id.required'=>'يجب ادخال المدينة التي ينتمي اليها المنطفة'
     ]);
   }
}
