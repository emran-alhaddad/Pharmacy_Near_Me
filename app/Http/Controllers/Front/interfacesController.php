<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Controllers\QueryController;
use App\Models\City;
use App\Models\zone;
use Illuminate\Http\Request;
use App\Models\Pharmacy;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Utils\SystemUtils;
use Illuminate\Support\Facades\Auth;

class interfacesController extends Controller
{

    public function index()
    {
        $pharmacies =  QueryController::pharmacies(6)->get();
        $services = DB::table('sevices_models')->get();// يحتوي على الخدمات التي يقدمها الموقع
        $infoSite = DB::table('site_admines')->get();// يحتوي على معلومات التواصل الاجتماعي وااسم الموقع وشعار الموقع
        $ads=DB::table('advertisings')->get();
        // return $ads;
        return view('front.index', [
            'pharmacies' => $pharmacies,
            'cities' => City::get(),
            'zones' => zone::get(),
            'ads'=>$ads,
            'infoSite'=>$infoSite,
            'services'=>$services
        ]);
    }

    public function contact()
    {
        $infoSite = DB::table('site_admines')->get();// يحتوي على معلومات التواصل الاجتماعي وااسم الموقع وشعار الموقع
        return view('front.contact', [
            'cities' => City::get(),
            'zones' => zone::get(),
            'infoSite'=>$infoSite
        ]);
    }



    public function pharmacy($search = null)
    {
        $pharmacies =  !$search ? QueryController::pharmacies()->get() : $search;

        return view('front.pharmacies', [
            'pharmacies' => $pharmacies,
            'cities' => City::get(),
            'zones' => zone::get()
        ]);
    }

    public function about()
    {      $infoSite = DB::table('site_admines')->get();// يحتوي على معلومات التواصل الاجتماعي وااسم الموقع وشعار الموقع
        return view('front.about', [
            'cities' => City::get(),
            'zones' => zone::get(),
            'infoSite'=>$infoSite
        ]);
    }

    public function notFound()
    {
        return view('front.404');
    }


    public function detailes($id)
    {
        $pharmacy = QueryController::pharmacies()->where('users.id', $id)->first();
        return view('front.phar-detailes', [
            'pharmacy' => $pharmacy,
            'cities' => City::get(),
            'zones' => zone::get()
        ]);
    }

    public function searchPharmacies(Request $request)
    {

        $qry = QueryController::pharmacies();

        if (!empty($request->name_Pharmacy)) $qry->where('users.name', $request->name_Pharmacy);
        if ($request->has('city')) $qry->where('zones.city_id', $request->city);
        if ($request->has('zone')) $qry->where('pharmacies.zone_id', $request->zone);
        // if ($request->has('zone')) $qry->whereIn('pharmacies.zone_id', $request->zone);

        $search = new interfacesController();
        return $search->pharmacy($qry->get());
    }


    public function add_order($id)
    {
        $pharmacy = QueryController::pharmacies()->where('users.id', $id)->first();
        return view('front.add_order', [
            'pharmacy' => $pharmacy,
        ]);
    }

    public function createRequestLicense($id)
    {
        $user = User::with('pharmacy')->where('id', $id)->first();
        if ($user) {
            if (!$user->pharmacy->license)
                return view('front.license')->with(['cities' => City::get(), 'zones' => zone::get(), 'id' => $id]);
            return back()->with('error', 'لقد قمت بتأكيد الرخصة مسبقا الرجاء إنتضار قبول إدارة الموقع');
        }
        return redirect()->route('login')->with('error', 'لا يمكنك الوصول إلى هذا الرابط');
    }
    public function storeRequestLicense(Request $request, $id)
    {
        if ($request->hasFile('license')) {
            $name = SystemUtils::insertLicense($request, 'license');
            Pharmacy::where('user_id', '=', $id)->update(array('license' => $name));
        } else {
            $request->validate(['license' => 'required'], [
                'license.required' => ' يجب ان تدخل صورة  الرخصة',
            ]);
        }

        $affectedRows = Pharmacy::where('user_id', $id)->update(array('zone_id' => $request->zone));
        if ($affectedRows > 0) {

            return redirect()->route('login')->with('status', 'تم ارسال الرخصة الى الادمن سيتم إرسال إشعار إلى بريدك الإلكتروني عند إكتمال العملية');
        }
        return redirect()->route('login')->with('error', 'حدث خطا');
    }

    public function localCheckout()
    {
        return view(
            'payment.payment',
            [
                'cities' => City::get(),
                'zones' => zone::get()
            ]
        );
    }

    public function getCityZones($id)
    {
        $zones =  zone::where(['city_id'=> $id,'is_active'=>1])->get(['id', 'name']);
        $data = "";
        foreach ($zones as $z) {
            $data .= "<option value='" . $z->id . "'>" . $z->name . "</option>";
        }
        return $data;
    }
}
