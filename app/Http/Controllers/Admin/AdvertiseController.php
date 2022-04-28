<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advertising;

class AdvertiseController extends Controller
{
    public function index()
   {
     $ads=new Advertising();
     $ads_data=$ads->get();
     return view('admin.ads');
    //  return view('welcome');

   } 

    public function create(Request $request)
    {
         $ads=new Advertising();
         $ads->admin_id=72;
         $ads->descripe=$request->descripe;
         $ads->owner=$request->owner;
         $ads->image=$request->image;
         $ads->url=$request->url;
         $ads->save();
         return "adding";
         
    }

   public function add()
   {
    //    return view('welcome');
   }

   
}
