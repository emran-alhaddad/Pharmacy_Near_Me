<?php

namespace App\Http\Controllers\User\request;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request as requestData;
use Illuminate\Support\Facades\DB;
use App\Models\Request_Details;
use App\Http\Controllers\QueryController;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    //
    public function index()
    {
        $user_requests = QueryController::userRequests(Auth::user()->id)->get();
        return "view request Form";
    }

    public function add()
    {
        // return view('add-request');
    }
    public function insert(requestData $request )
    {
        
         
        $allDurg=$request['data'];
        $paramicy=$request['pharmacy_id'];
        $client=$request["client_id"];
        $id = DB::table('requests')->insertGetId(
            ['client_id' => 2, 'pharmacy_id' => 1,'stats'=>0]
        );
        
        $obj_json_durg=json_decode($allDurg);
        $allDurg=$obj_json_durg->data;
        //return $allDurg;
    
        $Req_Details=new Request_Details();
        foreach($allDurg as $durg)
        {
            $Req_Details->request_id=$id;
            $Req_Details->drug_title=$durg->drug_title;
            $Req_Details->drug_image=$durg->drug_image;
            $Req_Details->quantity=$durg->quantity;
            if($durg->accept_alternative==1)
            {
                $Req_Details->repeat_until=$durg->repeat_until;
                $Req_Details->repeat_every=$durg->repeat_every;
            }
            $Req_Details->save();
            // DB::table('request__details')->insert([
            //     'request_id' => $id,
            //     'stats' => 0,
               
            //     'drug_title' => $durg->drug_title,
            //     'drug_image' => $durg->drug_image,
            //     'quantity' => $durg->quantity,

           
        }
    }

}
