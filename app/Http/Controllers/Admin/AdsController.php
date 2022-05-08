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
      
     
      $this->checkAds($request); 
      $id = DB::table('advertisings')->insertGetId(
        ['endAt' => $request->endAt, 'startAt' => $request->startAt,'is_active'=>1,'position'=>$request->position]
    );
      if($request->hasFile('image')){
        $ads=SystemUtils::updateImages($request,'Advertising');  
        Advertising::where('id', '=', $id)->update(array('image' =>$ads ));
     }
     
      if($request->filled('url'))
        {   
            $this->validationUrl($request,$id);
        }
        if($request->filled('descripe'))
        {   
            $this->validationUrl($request,$id);
        }
     
   
     if( $id>0)
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

    $this->checkAds($request); 
     $affected = DB::table('advertisings')
     ->where('id', $id)
     ->update([//'descripe' => $request->descripe,
               //'url' => $request->url,
              //  'image' => $request->image,
              //  'name' => $request->name,
              //  'is_active' => $request->is_active,
               'position' => $request->position,
               'startAt' => $request->startAt,
               'endAt' => $request->endAt,
              ]);

              if($request->filled('url'))
              {   
                  $this->validationUrl($request,$id);
              }
              if($request->filled('descripe'))
              {   
                  $this->validationUrl($request,$id);
              }      

   }

   public function doUpdataImage(Request $request)
{   
   
    $Advertising=  SystemUtils::updateImages($request,'Advertising');
    
    Advertising::where('id', '=', 1)->update(['image' => $Advertising]);
   
}
    
   public function delete($id)
   {
     $deleted = DB::table('advertisings')->where('id',$id)->delete();
   }


public function checkAds($request)
{
  
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
   Advertising::where('id', '=', $id)->update(array('url' => $request->url));
  }

  public function checkdescrip($request,$id)
 {
  $request->validate(['descripe' => 'min:4'],[
    'descripe.min'=>'يجب ان يكون  العنوان اربع احرف او اكثر'
 ]);
 Advertising::where('id', '=', $id)->update(array('descripe' => $request->descripe));
}

}
