<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advertising;

class AdvertiseController extends Controller
{
    //

    public function createAds(Request $request)
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

   public function showAds()
   {
       return view('welcome');
   }
   public function retreivAds()
   {
     $ads=new Advertising();
     $ads_data=$ads->get();
     dd($ads_data);
   } 
}
