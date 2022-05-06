<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
class CitiesController extends Controller
{
    //

    public function showCities(){
        $city=new City();
        $city=$city->get();
       // dd($city);
        return view('admin.Cities.show_Cities');
    }

    public function addCities(){
        return view('admin.Cities.add_Cities');
    }

    public function editCities($id){
        $city=new City();
        $city=$city->where('id',2)->get();
        //dd($city);
        return view('admin.Cities.edit_Cities');
    }

    public function doUpdate(Request $request,$id)
    {
        $affected = DB::table('cities')
     ->where('id', $id)
     ->update([
               'name' => $request->name,
               
     ]);     
    }
    public function create( Request $request)
    {
        $id=DB::table('cities')->insertGetId([
            'name' => $request->name,
        ]);
    }
    public function delete($id)
    {
        $deleted = DB::table('cities')->where('id',  $id)->delete();
        
    }
}
