<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class interfacesController extends Controller
{
    public function query()
    {
        return DB::table('users')
            ->join('pharmacies', 'users.id', 'pharmacies.user_id')
            ->join('zones', 'zones.id','pharmacies.zone_id')
            ->join('cities', 'cities.id','zones.city_id')
            ->select('users.*');
    }

    public function index()
    {
        $pharmacies =  $this->query()->get();

        return view('front.index',[
            'pharmacies'=>$pharmacies,
            'cities' => City::get(),
            'zones' => zone::get()
        ]);
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
