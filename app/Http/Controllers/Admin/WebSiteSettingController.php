<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\model\SiteAdmine;
class WebSiteSettingController extends Controller
{
    //

    public function showWebSiteSetting(){

        // return SiteAdmine::get();

        return view('admin.WebSiteSetting.show_WebSiteSetting');
    }

    public function AddService(){
        return view('admin.WebSiteSetting.Add_Service');
    }

    public function editService(){
        return view('admin.WebSiteSetting.edit_Service');
    }
}
