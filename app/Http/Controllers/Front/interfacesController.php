<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Controllers\QueryController;
use App\Models\City;
use App\Models\zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class interfacesController extends Controller
{

    public function index()
    {
        $pharmacies =  QueryController::pharmacies(6)->get();

        return view('front.index', [
            'pharmacies' => $pharmacies,
            'cities' => City::get(),
            'zones' => zone::get()
        ]);
    }

    public function contact()
    {
        return view('front.contact', [
            'cities' => City::get(),
            'zones' => zone::get()
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
    {
        return view('front.about', [
            'cities' => City::get(),
            'zones' => zone::get()
        ]);
    }

    public function notFound()
    {
        return view('front.404');
    }


    public function detailes($id)
    {
        $pharmacy = QueryController::pharmacies()->where('users.id',$id)->first();
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
        if (!Auth::check()) return back()->with('error','يجب عليك تسجيل الدخول أولا'); 
        $pharmacy = QueryController::pharmacies()->where('users.id',$id)->first();
        return view('front.add_order', [
            'pharmacy' => $pharmacy,
        ]);
    }
}
