<?php

namespace App\Http\Controllers\Front;
// use App\Models\sevicesModel;
// use App\Models\SiteAdmine;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function indexInfo()
    {
        $services = DB::table('sevices_models')->get();// يحتوي على الخدمات التي يقدمها الموقع
        $infoSite = DB::table('site_admines')->get();// يحتوي على معلومات التواصل الاجتماعي وااسم الموقع وشعار الموقع
        return $infoSite;

    }
}
