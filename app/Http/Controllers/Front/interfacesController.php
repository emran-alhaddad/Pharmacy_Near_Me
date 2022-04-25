<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class interfacesController extends Controller
{
    public function index()
    {
        return view('front.index');
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
        // return "ads Page";
    }
    public function about()
    {
        return view('front.about');
        // return "about Page";
    }
    public function confirm()
    {
        return view('email.verify-email');
        // return "about Page";
    }
}
