<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertising;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdsController extends Controller
{
    //
    public function index()
    {
        $ads = new Advertising();
        $ads_data = $ads->get();
        return view('admin.ads.show_ads', [
            'ads' => $ads_data
        ]);
    }

    public function add()
    {
        return view('admin.ads.add_ads');
    }


    public function create(Request $request)
    {
        $ads = new Advertising();

        $ads->descripe = $request->descripe;
        $ads->name = $request->name;
        $ads->image = $request->image;
        $ads->url = $request->url;
        $ads->position = $request->position;
        $ads->startAt = $request->startAt;
        // $ads->is_active = $request->is_active;
        $ads->endAt = $request->endAt;
       if( $ads->save())
        return back()->with('status', 'لقد تم إضافة الإعلان بنجاح');
        return back()->with('error', 'لقد تم إضافة الإعلان بنجاح');
        
    }

    public function edit($id)
    {
        $adsData = DB::table('advertisings')->select("advertisings.*")
            ->where('id', $id)
            ->first();
        return view('admin.ads.edit_ads', [
            'ads' => $adsData
        ]);

        

    }

    public function update(Request $request, $id)
    {

        $affected = DB::table('advertisings')
            ->where('id', $id)
            ->update([
                'descripe' => $request->descripe,
                'url' => $request->url,
                // 'image' => $request->image,
                // 'owner' => $request->owner,
                // 'is_active' => $request->is_active,
                'position' => $request->position,
                'startAt' => $request->startAt,
                'endAt' => $request->endAt,
            ]);
            if($affected)
            return back()->with('status', 'لقد تم تعديل الإعلان بنجاح');
            return back()->with('error', 'لقد تم تعديل الإعلان بنجاح');
    }


    public function delete($id)
    {
        $deleted = DB::table('advertisings')->where('id', $id)->delete();
        return back()->with('status', 'لقد تم حذف الإعلان بنجاح');
    }

    public function toggle($id, $status)
    {
        $affected = DB::table('advertisings')
            ->where('id', $id)
            ->update(['is_active' => $status]);
    
            if($affected && $status==0)
            return back()->with('status', 'لقد تم تغيير حالة الإعلان الى موقف');
            elseif($affected && $status==1)
            return back()->with('status', 'لقد تم تغيير حالة الإعلان الى مفعل');
           else return back()->with('status', 'لقد تم تعديل الإعلان بنجاح');
        
    }
}
