<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestsController extends Controller
{
    //

    public function showRequests(){
        return view('admin.Requests.show_Requests');
    }

    public function showRequestDetails(){
        return view('admin.Requests.show_RequestDetails');
    }



}
