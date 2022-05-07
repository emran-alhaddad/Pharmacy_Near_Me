<?php

namespace App\Http\Controllers\User;

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
            ['client_id' => $client, 'pharmacy_id' => $paramicy]
        );
        
        $obj_json_durg=json_decode($allDurg);
        $allDurg=$obj_json_durg->data;
        //return $allDurg;
    
        
        foreach($allDurg as $durg)
        {
            $Req_Details=new Request_Details();

            $Req_Details->request_id=$id;
            if(isset($durg->drug_title)) $Req_Details->drug_title=$durg->drug_title;
            if(isset($durg->drug_image)) $Req_Details->drug_image=$durg->drug_image;
            if(isset($durg->quantity)) $Req_Details->quantity=$durg->quantity;

            if($durg->accept_alternative=="on")
            {
            if(isset($durg->repeat_until)) $Req_Details->repeat_until=$durg->repeat_until;
            if(isset($durg->repeat_every)) $Req_Details->repeat_every=$durg->repeat_every;
            }
            
            if(!$Req_Details->save()){
                return back()->with('error','لم نتمكن من إضافة طلبيتك !!!');
                }
            
  
        }

        return back()->with('status','تم إضافة الطلبية بنجاح');
            
    }

}
