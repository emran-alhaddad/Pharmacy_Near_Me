<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use Illuminate\Support\Facades\DB;
class CitiesController extends Controller
{
    //

    public function showCities(){
        
        $city_data=  City::get();
        // return $city_data;
        return view('admin.Cities.show_Cities')->with('cities',$city_data);
    }

    public static function getCity(){
        
        $city_data=  City::get();
        // return $city_data;
        return $city_data;
    }

    public function activity($id,$state)
    {
        $affected=DB::table('cities')
        ->where('id', $id)
        ->update(['is_active'=>$state]);
        if($affected>0 && $state==0)
        {
            return back()->with('status','تم توقيف المدينة ');
        }
        elseif($affected>0 && $state==1)
        return back()->with('status','  تم تفعيل المدينة ');
        else  return back()->with('error','  حدث خطاء الرجاء اعادة المحاولة');

    }

    public function addCities(){
        return view('admin.Cities.add_Cities');
    }

    public function editCities($id){
       
        $city_data=  City::where('id',$id)->first();
        //dd($city);
        return view('admin.Cities.edit_Cities')->with('city',$city_data);
    }

    public function doUpdate(Request $request,$id)
    {      
        $this->checkName($request);
       
         $affectedRows = City::where('id', $id)->update(['name' => $request->name]);
         if($affectedRows>0)
        {
            return back()->with('status','تم تعديل مدينة ');
        }
        return back()->with('error',' لم يتم تعديل مدينة  ');
        
    }
    public function create( Request $request)
    {    $this->checkName($request);
        $id=DB::table('cities')->insertGetId(['name' => $request->name,]);
        if($id)
        {
            return back()->with('status','تم اضافة مدينة جديدة');
        }
        return back()->with('error',' لم يتم اضافة مدينة جديدة ');

    }
    public function delete($id)
    {
        $deleted = DB::table('cities')->where('id',  $id)->delete();
        if($deleted>0)
        {
            return back()->with('status','تم حذف مدينة ');
        }
        return back()->with('error',' لم يتم حذف مدينة ');
        
    }
   public function checkName(Request $request)
   {
    $request->validate(['name' => 'required|min:2'],[
    
        'name.required'=>'يجب ادخال اسم المدينة '
     ]);
   }
  
   
}
