<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Request as OrderRequest;
use Illuminate\Http\Request;

class RequestsController extends Controller
{
    //

    public function showRequests(){
       // return  OrderRequest::with(['details','pharmacy.user','client.user','replies.details'])->first();
       $requests = OrderRequest::with(['details','pharmacy.user','replies.details'])->get();
       $client = User::with('client')->firstOrFail();
       return view('user.order.index',[
           'requests' => $requests,
           'user' => $client
       ]);
        // return view('user.order.index');
    }

    public function showRequestDetails(){
        return view('admin.Requests.show_RequestDetails');
    }

    public function addRequests(){
        return view('admin.Requests.add_Requests');
    }

    public function editRequests(){
        return view('admin.Requests.edit_Requests');
    }


}
