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
        
       $requests = OrderRequest::with(['pharmacy.user','pharmacy.zone.city','client.user'])->get();
    //    return $requests;
    //    $client = User::with('client')->firstOrFail();
    //    return view('user.order.index',[
    //        'requests' => $requests,
    //        'user' => $client
    //    ]);
    return view('admin.Requests.show_Requests')->with('request',  $requests);
    }

    public function showRequestDetails($id){
        $requests = OrderRequest::with(['details','pharmacy.user','client.user','replies.details'])->where('id',5)->get();
        return view('admin.Requests.show_RequestDetails')->with('request',  $requests);
    }

    public function addRequests(){
        return view('admin.Requests.add_Requests');
    }

    public function editRequests(){
        return view('admin.Requests.edit_Requests');
    }


}
