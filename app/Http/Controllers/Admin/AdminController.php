<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function showPharmacies(){
        return view('admin.phar');
    }

    public function showUsers(){
        return view('admin.user');
    }

    public function showCompliants(){
        return view('admin.complaints');
    }

    public function showNotifications(){
        return view('admin.notifications');
    }

    public function showCities(){
        return view('admin.cities');
    }

    public function showZones(){
        return view('admin.zone');
    }
}
