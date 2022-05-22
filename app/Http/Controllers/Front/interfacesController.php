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
use App\Http\Controllers\Notify\NotificationsController;
use App\Mail\AddsRequestEmail;
use App\Models\Advertising;
use App\Models\AdvertisingOwner;
use App\Utils\ErrorMessages;
use App\Utils\SuccessMessages;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class interfacesController extends Controller
{

    public function index()
    {
        $pharmacies =  QueryController::pharmacies(6)->get();
        $services = DB::table('sevices_models')->get(); // يحتوي على الخدمات التي يقدمها الموقع
        $infoSite = DB::table('site_admines')->get(); // يحتوي على معلومات التواصل الاجتماعي وااسم الموقع وشعار الموقع
        $ads = DB::table('advertisings')->get();
        // return $ads;
        return view('front.index', [
            'pharmacies' => $pharmacies,
            'cities' => City::get(),
            'zones' => zone::get(),
            'ads' => $ads,
            'infoSite' => $infoSite,
            'services' => $services
        ]);
    }

    public function contact()
    {
        $infoSite = DB::table('site_admines')->get(); // يحتوي على معلومات التواصل الاجتماعي وااسم الموقع وشعار الموقع
        return view('front.contact', [
            'cities' => City::get(),
            'zones' => zone::get(),
            'infoSite' => $infoSite
        ]);
    }

    public function pharmacy($search = null)
    {
        $pharmacies =  !$search ? QueryController::pharmacies()->paginate(4) : $search;

        return view('front.pharmacies', [
            'pharmacies' => $pharmacies,
            'cities' => City::get(),
            'zones' => zone::get()
        ]);
    }

    public function about()
    {
        $infoSite = DB::table('site_admines')->get(); // يحتوي على معلومات التواصل الاجتماعي وااسم الموقع وشعار الموقع
        return view('front.about', [
            'cities' => City::get(),
            'zones' => zone::get(),
            'infoSite' => $infoSite
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

        if (!empty($request->name_Pharmacy)) $qry->where('users.name', 'like', '%' . $request->name_Pharmacy . '%');
        if ($request->has('city')) $qry->where('zones.city_id', $request->city);
        if ($request->has('zone')) $qry->where('pharmacies.zone_id', $request->zone);
        // if ($request->has('zone')) $qry->whereIn('pharmacies.zone_id', $request->zone);

        $search = new interfacesController();
        return $search->pharmacy($qry->paginate(4));
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

            $Notify = new NotificationsController();
            $Notify->licenseNotification($id);
            return redirect()->route('login')->with('status', '.تم ارسال الرخصة الى الادمن سيتم إرسال إشعار إلى بريدك الإلكتروني عند إكتمال العملية');
        }
        return redirect()->route('login')->with('error', '!!حدث خطا');
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
        $zones =  zone::where(['city_id' => $id, 'is_active' => 1])->get(['id', 'name']);
        $data = "";
        foreach ($zones as $z) {
            $data .= "<option value='" . $z->id . "'>" . $z->name . "</option>";
        }
        return $data;
    }

    public function addAdvertisingRequest(Request $request)
    {
        $request->validate(['email' => 'required|email'], [
            'email.required' => 'البريد الإلكتروني مطلوب',
            'email.email' => 'بريد إلكتروني غير صالح'
        ]);

        $addsOwner = new AdvertisingOwner();
        $addsOwner->email = $request->email;
        if ($request->has('name')) $addsOwner->name = $request->name;
        if ($request->has('phone')) $addsOwner->phone = $request->phone;

        $token = Str::uuid();
        $addsOwner->remember_token = $token;
        if (!$addsOwner->name) $addsOwner->name = $addsOwner->email;
        $email_data = [
            'name' => $addsOwner->name,
            'activation_url' => URL::to('/') . '/advertisings/create/' . $token
        ];

        Mail::to($request->email)->send(new AddsRequestEmail($email_data));
        $addsOwner->save();
        return  back()->with('status', SuccessMessages::ADDS_REQUEST_SUCCESS);
    }

    public function createAdvertisingRequest($token)
    {

        $addsOwner = AdvertisingOwner::where('remember_token', $token)->first();

        if ($addsOwner) {
            $addsOwner->email_verified_at = Carbon::now()->timestamp;
            $addsOwner->update();
            return view('front.add-advertising')->with(
                [
                    'token' => $token,
                    'status' => SuccessMessages::ADDS_REQUEST_VERIFIED
                ]
            );
        }

        return redirect()->route('index')->with('error', ErrorMessages::ADDS_REQUEST_EXPIRED);
    }

    public function storeAdvertisingRequest(Request $request)
    {

        $addsOwner = AdvertisingOwner::where('remember_token', $request->token)->first();

        if ($addsOwner) {

            // Save Adds
            $this->checkAds($request);
            $ads = new Advertising();

            $ads->descripe = $request->descripe;

            $ads->image = SystemUtils::updateImages($request, 'ads');
            $ads->url = $request->url;
            $ads->position = $request->position;
            $ads->startAt = $request->startAt;
            $ads->price = $request->price;
            // $ads->is_active = $request->is_active;
            $ads->endAt = $request->endAt;
            if ($ads->save()) {
                $addsOwner->email_verified_at = Carbon::now()->timestamp;
                $addsOwner->remember_token = null;
                $addsOwner->advertising_id = $ads->id;
                $addsOwner->update();
                // Make Payment
                return redirect()->route('user-payment-ads',[$ads->id,true])
                ->with('status',SuccessMessages::ADDS_REQUEST_REGISTER);
            }
            return back()->with('error', 'لم نتمكن من إضافة إعلانك ... الرجاء المحاولة مرة أخرى');
        } 
            return redirect()->route('index')->with('error', ErrorMessages::ADDS_REQUEST_EXPIRED);
    }


    public function checkAds($request)
    {
        $request->validate(
            [
                'position' => 'required',
                'startAt' => 'required|date|before:endAt',
                'endAt' => 'required|date|after:startAt',
            ],
            [
                'position.required' => 'يجب تحديد  مكان الاعلان ',
                'startAt.required' => 'يجب تحديد  بداية تاريخ الاعلان ',
                'endAt.required' => 'يجب تحديد  نهاية تاريخ الاعلان',
                'startAt.date' => 'يجب ان يكون صيغة التاريخ    ',
                'endAt.date' => 'يجب ان يكون صيغة التاريخ    ',
                'startAt.before' => '  يجب ان يكون  التاريخ  البداية اقل من تاريخ النهاية  ',
            ]
        );
    }
}
