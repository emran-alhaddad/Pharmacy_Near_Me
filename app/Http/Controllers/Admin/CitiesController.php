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
        return view('admin.Cities.show_Cities');
    }

    public function activity($id,$state)
    {
        DB::table('cities')
        ->where('id', $id)
        ->update(['is_active'=>$state]);
    }

    public function addCities(){
        return view('admin.Cities.add_Cities');
    }

    public function editCities($id){
       
        $city_data=  City::where('id',2)->get();
        //dd($city);
        return view('admin.Cities.edit_Cities');
    }

    public function doUpdate(Request $request,$id)
    {      
        $this->checkName($request);
       
         $affectedRows = City::where('id', $id)->update(['name' => $request->name]);
         if($affectedRows>0)
        {
            return back()->with('secuss','تم تعديل مدينة ');
        }
        return back()->with('error',' لم يتم تعديل مدينة  ');
        
    }
    public function create( Request $request)
    {    $this->checkName($request);
        $id=DB::table('cities')->insertGetId(['name' => $request->name,]);
        if($id>0)
        {
            return back()->with('secuss','تم اضافة مدينة جديدة');
        }
        return back()->with('error',' لم يتم اضافة مدينة جديدة ');

    }
    public function delete($id)
    {
        $deleted = DB::table('cities')->where('id',  $id)->delete();
        if($deleted>0)
        {
            return back()->with('secuss','تم حذف مدينة ');
        }
        return back()->with('secuss',' لم يتم حذف مدينة ');
        
    }
   public function checkName(Request $request)
   {
    $request->validate(['name' => 'required|min:2'],[
    
        'name.required'=>'يجب ادخال اسم الصيدلية '
     ]);
   }  
}
