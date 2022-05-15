<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 use App\models\SiteAdmine;
 use Illuminate\Support\Facades\DB;
 use App\Http\Controllers\Admin\ServicesController;
 use App\Utils\SystemUtils;
 use  Illuminate\Support\Facades\Validator;
class WebSiteSettingController extends Controller
{
    //

    public function showWebSiteSetting(){
        
        
    //    return  
     $sites= DB::table('site_admines')->first();
    
     $services=ServicesController::index();

         

        return view('admin.WebSiteSetting.show_WebSiteSetting')->with(['site'=>$sites,'services'=>$services]);
      
    }
    public function update(Request $request)
    {   $this->validationIndexMain($request);
        $affected=DB::table('site_admines')
      
        ->update(['name'=>$request->name,'address_main'=>$request->address_main,'descripe_main'=>$request->descripe_main]);
        if($affected>0)
        {
             return back()->with('status','تم  تعديل بيانات الموقع ');
          
        }
        else
        // response()->json(['failde update']);
         return back()->with('error','لم يتم  تعديل بيانات الموقع ');

    }
    public function updateContact(Request $request)
    {  $this->checkSocialMieda($request);
        $affected=DB::table('site_admines')
         ->update(['facebook'=>$request->facebook,'twitter'=>$request->twitter,'whatsup'=>$request->whatsup,
                   'google'=>$request->google,'phone'=>$request->phone]);
        if($affected>0)
        {
            return back()->with('status','تم  تعديل بيانات الموقع ');
        }
        else
        return back()->with('error','لم يتم  تعديل بيانات الموقع ');

    }
    public function create(Request $request)
    {
        $affected=DB::table('site_admines')
      
        ->update(['descripe_ser_client'=>$request->descripe_ser_client,
                  'descripe_ser_phar' =>$request->descripe_ser_phar,
                  'descripe_ser_user'=>$request->descripe_ser_user,
                   'descripe_about'=>$request->descripe_about,
                   'title_about'=>$request->title_about]);
                   return response()->json("yes data");
        // if($affected>0)
        // {
        //     return back()->with('status','تم  تعديل بيانات من نحن ');
        // }
        // else
        // return back()->with('error','لم يتم  تعديل بيانات الموقع ');
    }

    public function updateLogo(Request $request)
    {
        $userAvater= SystemUtils::updateLogo($request,'logo');

        $effect=  $userDate = DB::table('site_admines')->update(['logo' =>$userAvater]);
        if($effect)
        {
          return back()->with('status','تم تعديل لوجو الموقع  بنجاح');
        }
        return back()->with('error',' لم تم تعديل لوجو الموقع  بنجاح');

    
    }

   

    public function editService(){
        return view('admin.WebSiteSetting.edit_Service');
    }
    // public function getServices()
    // {
    //     return 
    // }
    public function checkSocialMieda($request)
    { 
    
    if($request->filled('facebook'))
    {    $this->validationFacebook($request);
    
    } 
    
    if($request->filled('twitter'))
    {   
     
    $this->validationTwitter($request);
    }
    if($request->filled('google'))
    {   
      $this->validationGoogle($request);
    }  
}
public function validationFacebook($request)
  {
    Validator::validate($request->all(),
    ['facebook' => ['url'] ],

   ['facebook.url'=>'يجب ادخال رابط الفيسبوك بطريقة صحيحة']
);
$siteadmine=new SiteAdmine();
 $siteadmine->update(array('facebook' => $request->facebook));

  }

  public function validationTwitter($request)
  {
    Validator::validate($request->all(),
    ['twitter' => ['url'] ],

   ['twitter.url'=>'يجب ادخال رابط التويتر بطريقة صحيحة']
);

$siteadmine=new SiteAdmine();
 $siteadmine->update(array('twitter' => $request->twitter));

  }

  public function validationGoogle($request)
  {
    Validator::validate($request->all(),
    ['google' => ['url'] ],

   ['google.url'=>'يجب ادخال رابط جوجل بطريقة صحيحة']
);
$siteadmine=new SiteAdmine();
 $siteadmine->update(array('google' => $request->google));

  }

  public function validationIndexMain($request) 
  {
    $request->validate(['address_main' => 'min:5','descripe_main'=>'min:10','name'=>'min:3'],[
      'address_main.min'=>'يجب ادخال ما يقل خمسة احرف تصف عنوان',
      'descripe_main.min'=>'يجب ادخال ما يقل عشرة احرف تصف عنوان',
      'name.min'=>'يجب ادخال ما يقل ثلاثة احرف تصف عنوان',
      
   ]);
  }

}
