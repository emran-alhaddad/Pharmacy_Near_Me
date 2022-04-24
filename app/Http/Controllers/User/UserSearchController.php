<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pharmacy;
use Illuminate\Support\Facades\DB;

class UserSearchController extends Controller
{

    public function query()
    {
        return DB::table('users')
            ->join('pharmacies', 'users.id', 'pharmacies.user_id')
            ->join('zones', 'zones.id','pharmacies.zone_id')
            ->join('cities', 'cities.id','zones.city_id')
            ->select('users.*');
    }
    public function searchPharmacies(Request $request)
    {

            $qry = $this->query();

            if(!empty($request->name_Pharmacy)) $qry->where('users.name',$request->name_Pharmacy);
            if($request->has('city')) $qry->where('zones.city_id',$request->city);
            if($request->has('zone')) $qry->where('pharmacies.zone_id',$request->zone);

            dd($qry->get());
        return response($phar);
    }

}
