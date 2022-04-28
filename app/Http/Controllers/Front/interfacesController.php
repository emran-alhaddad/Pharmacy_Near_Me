<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Controllers\QueryController;
use App\Models\City;
use App\Models\zone;

class interfacesController extends Controller
{

    public function index($search = null)
    {
        $pharmacies =  !$search ? QueryController::pharmacies(4)->get() : $search;

        return view('front.index', [
            'pharmacies' => $pharmacies,
            'cities' => City::get(),
            'zones' => zone::get()
        ]);
    }
    public function  userProfile()
    {
        return view('user.userProfile');
    }
    public function contact()
    {
        return view('front.contact');
    }

    public function pharmacy()
    {
        return view('front.pharmacies');
    }
    public function ads()
    {
        return view('front.ads');
    }
    public function about()
    {
        return view('front.about');
    }
    public function confirm()
    {
        return view('email.verify-email');
    }
}
