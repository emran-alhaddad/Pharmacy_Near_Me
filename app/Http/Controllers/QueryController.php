<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryController extends Controller
{
    public static function pharmacies($take=1000)
    {
        return DB::table('users')
            ->join('pharmacies', 'users.id', 'pharmacies.user_id')
            ->join('zones', 'zones.id','pharmacies.zone_id')
            ->join('cities', 'cities.id','zones.city_id')
            ->select('users.*','zones.name AS Zname','cities.name AS Cname')
            ->orderByDesc('pharmacies.user_id')
            ->take($take);
    }

    public static function userRequests($id)
    {
        return DB::table('requests')
            ->join('pharmacies', 'pharmacies.user_id', '=', 'requests.pharmacy_id')
            ->join('users', 'pharmacies.user_id', '=', 'users.id')
            ->join('request__details', 'request__details.request_id', '=', 'requests.id')
            ->select('users.name', 'request__details.drug_title','request__details.drug_image',
               'request__details.repeat_every', 'request__details.repeat_until','requests.state')
            ->where('users.id',$id);
    }
}
