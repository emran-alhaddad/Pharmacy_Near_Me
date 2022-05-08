<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ZonesController extends Controller
{
    //

    public function showZones(){
        return view('admin.Zones.show_Zones');
    }

    public function addZones(){
        return view('admin.Zones.add_Zones');
    }

    public function editZones(){
        return view('admin.Zones.edit_Zones');
    }
}
