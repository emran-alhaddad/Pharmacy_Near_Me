<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advertising;
use App\Utils\SystemUtils; 
class AdvertiseController extends Controller
{
    public function index()
    {
        // $ads=new
       $ads_data=  Advertising::get();
        // $ads_data=$ads->get();
        return view('admin.ads')->with('ads',$ads_data);
        //  return view('welcome');

    }

        public function create(Request $request)
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
            // $ads->admin_id=72;
            $ads->descripe=$request->descripe;
            // $ads->owner=$request->owner;
            $ads->image= SystemUtils::updateImages($request,'Advertising');
            $ads->url=$request->url;
            $ads->position=$request->position;
            $ads->startAt=$request->startAt;
            $ads->is_active=1;
            $ads->endAt=$request->endAt;
           if( $ads->save())
           {
               return 'تم اضافة الاعلان ';
           }
           return 'لم تم اضافة الاعلان ';
        

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

}
