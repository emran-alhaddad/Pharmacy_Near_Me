<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Front\interfacesController;
use App\Http\Controllers\QueryController;
use App\Models\City;
use App\Models\zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserSearchController extends Controller
{

    public function searchPharmacies(Request $request)
    {

        $qry = QueryController::pharmacies();

        if (!empty($request->name_Pharmacy)) $qry->where('users.name', $request->name_Pharmacy);
        if ($request->has('city')) $qry->where('zones.city_id', $request->city);
        if ($request->has('zone')) $qry->where('pharmacies.zone_id', $request->zone);

        $search = new interfacesController();
        return $search->index($qry->get());

    }
}
