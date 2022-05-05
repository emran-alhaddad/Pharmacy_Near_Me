<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    //
    public function showAds(){
        return view('admin.ads.show_ads');
    }

    public function addAds(){
        return view('admin.ads.add_ads');
    }

    public function editAds(){
        return view('admin.ads.edit_ads');
    }
}
