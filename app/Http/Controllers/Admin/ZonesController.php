<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\zone;
use App\Models\City;
use App\Http\Controllers\Admin\CitiesController;
use Illuminate\Support\Facades\DB;
class ZonesController extends Controller
{
    //

    public function showZones(){
         // $id = Auth::id();
   
    $user= DB::table('zones')
        ->join('cities', 'cities.id', '=', 'zones.city_id')

        ->select('cities.name As Cname', 'zones.*')
        // ->where('id',$id)
        ->get();
        // dd($user);
        return view('admin.Zones.show_Zones')->with('zones',$user);

    }

    public function activity($id,$state)
    {
        $affected=DB::table('zones')
        ->where('id', $id)
        ->update(['is_active'=>$state]);
        if($affected>0 && $state==0)
        {
            return back()->with('status','تم توقيف المنطقة ');
        }
        elseif($affected>0 && $state==1)
        return back()->with('status','  تم تفعيل المنطقة ');
        else  return back()->with('error','  حدث خطاء الرجاء اعادة المحاولة');

    }

    public static function getZone()
    {
        return zone::get();
    }
    public function addZones(){
        $city=CitiesController::getCity();
        return view('admin.Zones.add_Zones')->with('cities',$city);
    }

    public function editZones($id){

    
    $user= DB::table('zones')
        ->join('cities', 'cities.id', '=', 'zones.city_id')

        ->select('cities.id As Cid', 'zones.*')
        ->where('zones.id',$id)
        ->first();
        $city=CitiesController::getCity();

        return view('admin.Zones.edit_Zones')->with(['id'=>$id,'zone'=>$user,'cities'=>$city]);
    }


    public function doUpdate(Request $request,$id)
    {
        $this->checkName($request);
        $this->checkCity($request);
        $affectedRows = zone::where('id', $id)->update(['name' => $request->name,'city_id'=>$request->city_id]);

        if($affectedRows>0)
        {
            return back()->with('status','تم تعديل منطقة  ');
        }
        return back()->with('error',' لم تم تعديل منطقة ');

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
