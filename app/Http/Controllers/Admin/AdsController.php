<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Advertising;
use App\Utils\SystemUtils; 

class AdsController extends Controller
{
    //
    public function showAds(){
        
     $ads_data=Advertising::get();
      //  dd($ads_data);
        return view('admin.ads.show_ads');
    }

    public function addAds(){
        return view('admin.ads.add_ads');
    }
    public function create(Request $request)
    {
      
      // $ads->admin_id=72;
      $this->checkAds($request);
      // $ads->descripe=$request->descripe;
      $id = DB::table('advertisings')->insertGetId(
        ['endAt' => $request->endAt, 'startAt' => $request->startAt,'is_active'=>1,'position'=>$request->position]
    );
      // $ads->owner=$request->owner;
      if($request->hasFile('image')){
         
        $ads=SystemUtils::updateImages($request,'Advertising');
        
        Advertising::where('id', '=', $id)->update(array('image' =>$ads ));

     }
      // $ads->image= SystemUtils::updateImages($request,'Advertising');
      $this->validationUrl($request,$id);
      $ads->url=$request->url;
      // $ads->position=$request->position;
      // $ads->startAt=$request->startAt;
      // $ads->is_active=1;
      // $ads->endAt=$request->endAt;
     if( $ads->save())
     {
         return 'تم اضافة الاعلان ';
     }
     return 'لم تم اضافة الاعلان ';
  

         
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
              //  'image' => $request->image,
              //  'owner' => $request->owner,
              //  'is_active' => $request->is_active,
               'position' => $request->position,
               'startAt' => $request->startAt,
               'endAt' => $request->endAt,
              ]);

   }

   public function doUpdataImage(Request $request)
{   
   
    $userAvater=  SystemUtils::updateImages($request,'Advertising');
    
    Advertising::where('id', '=', 1)->update(['image' => $userAvater]);
   
}
    
   public function delete($id)
   {
     $deleted = DB::table('advertisings')->where('id',$id)->delete();
   }


public function checkAds($request)
{
  $ads=new Advertising();
            $request->validate(
                [
                    'name' => 'required|min:3',
                    'position' => 'required',
                    'startAt' => 'required|date|before:endAt',
                    'endAt' => 'required|date|after:startAt',
                
                ],[
    
                'name.required'=>'يجب ادخال اسم الاعلان ',
                'name.min'=>' ا  3 يجب  اسم الاعلان ',
                'position.required'=>'يجب تحديد  مكان الاعلان ',
                'startAt.required'=>'يجب تحديد  بداية تاريخ الاعلان ',
                'endAt.required'=>'يجب تحديد  نهاية تاريخ الاعلان', 
                'startAt.date'=>'يجب ان يكون صيغة التاريخ    ',
                'endAt.date'=>'يجب ان يكون صيغة التاريخ    ',
                'startAt.before'=>'  يجب ان يكون  التاريخ  البداية اقل من تاريخ النهاية  ',
                'endAt.date'=>'  يجب ان يكون  التاريخ  النهاية اكبر من تاريخ البداية  ',
               
             ]);
}

   public function validationUrl($request,$id)
  {
    Validator::validate($request->all(),
    ['url' => ['url'] ],

   ['url.url'=>'يجب ادخال رابط  بطريقة صحيحة']); 
  }

  public function checkdescrip($request,$id=null)
 {
  $request->validate(['address' => 'min:4'],[
    'address.min'=>'يجب ان يكون  العنوان اربع احرف او اكثر'
 ]);
 Pharmacy::where('user_id', '=', $id)->update(array('address' => $request->address));
}

}
