<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\sevicesModel;
use Illuminate\Support\Facades\DB;
use App\Utils\SystemUtils;


class ServicesController extends Controller
{
    //

    public static function index()
    {
      return sevicesModel::get();
    }
    public function activity($id,$state)
    {
        $affected=DB::table('sevices_models')
        ->where('id', $id)
        ->update(['is_active'=>$state]);
        if($affected>0 && $state==0)
        {
            return back()->with('status','تم توقيف الخدمة ');
        }
        elseif($affected>0 && $state==1)
        return back()->with('status','  تم تفعيل الخدمة ');
        else  return back()->with('error','  حدث خطاء الرجاء اعادة المحاولة');

    }
    public function edit($id){
         $service=sevicesModel::where('id',$id)->first();
        return view('admin.WebSiteSetting.edit_Service')->with('service',$service);
    }
    public function update(Request $request)
    {
        $affectedRows = sevicesModel::where('id',$request->id )->update(['title' => $request->title,'descripe'=>$request->descripe]);

         if($affectedRows>0)
        {
            return back()->with('status','تم تعديل الخدمة ');
        }
        return back()->with('error',' لم يتم تعديل الخدمة  ');
        
    }
    public function AddService(){
        return view('admin.WebSiteSetting.Add_Service');
    }

    public function updateImageService(Request $request)
    {
        $path=SystemUtils::UpdateImages($request,'service');

        $effect=sevicesModel::where('id', '=',$request->id )->update(['image' => $path]);
      
        if($effect)
        {
          return back()->with('status','تم تعديل صورة  الخدمة  بنجاح');
        }
        return back()->with('error',' لم تم تعديل صورة الخدمة  بنجاح');
    }

    public function storeService(Request $request){
       // return $request;
      $path=SystemUtils::UpdateImages($request,'service');
        $affectedRows=DB::table('sevices_models')->insert([
            'title' =>  $request->title, 
            'descripe' => $request->descripe,
            'image'=>$path
        ]);
        if($affectedRows>0)
        {
            return back()->with('status','تم اضافة الخدمة ');
        }
        return back()->with('error',' لم يتم اضافة  الخدمة  ');
    }
    
}
