<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryController extends Controller
{
    public static function pharmacies()
    {
        return DB::table('users')
            ->join('pharmacies', 'users.id', 'pharmacies.user_id')
            ->join('zones', 'zones.id','pharmacies.zone_id')
            ->join('cities', 'cities.id','zones.city_id')
            ->select('users.*');
    }
}
