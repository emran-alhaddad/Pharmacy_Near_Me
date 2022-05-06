<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdsController extends Controller
{
    //
    public function showAds(){
        $ads=new Advertising();
     $ads_data=$ads->get();
     
        return view('admin.ads.show_ads');
    }

    public function addAds(){
        return view('admin.ads.add_ads');
    }
    public function create(Request $request)
    {
         $ads=new Advertising();
         
         $ads->descripe=$request->descripe;
         $ads->owner=$request->owner;
         $ads->image=$request->image;
         $ads->url=$request->url;
         $ads->position=$request->position;
         $ads->startAt=$request->startAt;
         $ads->is_active=$request->is_active;
         $ads->endAt=$request->endAt;
         $ads->save();
         return "adding";
         
    }

    public function Activate($id,$status)
   {
     $affected = DB::table('advertisings')
     ->where('id', $id)
     ->update(['is_active' =>$status ]);
   }


    public function editAds($id){
        $adsDate=DB::table('advertisings')->select("advertisings.*")
        ->where('id',$id)
        ->get();
        return view('admin.ads.edit_ads');
    }

    public function doUpdate(Request $request,$id)
   { 


     $affected = DB::table('advertisings')
     ->where('id', $id)
     ->update(['descripe' => $request->descripe,
               'url' => $request->url,
               'image' => $request->image,
               'owner' => $request->owner,
               'is_active' => $request->is_active,
               'position' => $request->position,
               'startAt' => $request->startAt,
               'endAt' => $request->endAt,
              ]);

   }

   public function delete($id)
   {
     $deleted = DB::table('advertisings')->where('id',$id)->delete();
   }

}
