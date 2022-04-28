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

    public function Show_phar(){
        return view('admin.phar');
    }

    public function Show_ads(){
        return view('admin.ads');
    }

    public function Show_user(){
        return view('admin.user');
    }

    public function Show_complaints(){
        return view('admin.complaints');
    }

    public function Show_notifications(){
        return view('admin.notifications');
    }

    public function Show_cities(){
        return view('admin.cities');
    }

    public function Show_zone(){
        return view('admin.zone');
    }
}
