<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Reply;
use App\Models\Request_Details;
use App\Models\User;
use App\Models\Request as OrderRequest;
use App\Utils\ReplyState;
use App\Utils\RequestState;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        
        $requests = OrderRequest::with(['details','pharmacy.user','replies.details'])
        ->where('client_id',Auth::id())->orderByDesc('id')->get();
        $client = User::with('client')->where('id', Auth::id())->firstOrFail();
        return view('user.order.index',[
            'requests' => $requests,
            'user' => $client
        ]);

    }

    public function create()
    {
        $client = User::with('client')->where('id', Auth::id())->firstOrFail();
        return view('user.order.add',[
            'user' => $client
        ]);

    }

    public function store(Request $request )
    {

        if(empty($request['data']))
            return back()->with('error','يجب عليك أولا إضافة الطلبية قبل إرسالها ');

        $allDurg= $request['data'];
        $paramicy=$request['pharmacy_id'];
        $client=$request["client_id"];

        $req = new OrderRequest();
        $req->client_id = $client;
        $req->pharmacy_id = $paramicy;
        $req->save();
        
        $id = $req->id;
        
        
        $obj_json_durg=json_decode($allDurg);
        $allDurg=$obj_json_durg->data;

    
        
        foreach($allDurg as $durg)
        {
            $Req_Details=new Request_Details();

            $Req_Details->request_id=$id;
            if(isset($durg->drug_title)) $Req_Details->drug_title=$durg->drug_title;
            if(isset($durg->drug_image)) $Req_Details->drug_image=$durg->drug_image;
            if(isset($durg->quantity)) $Req_Details->quantity=$durg->quantity;

            $Req_Details->accept_alternative = $durg->accept_alternative;
    
            if(isset($durg->repeat_until)) $Req_Details->repeat_until=$durg->repeat_until;
            if(isset($durg->repeat_every)) $Req_Details->repeat_every=$durg->repeat_every;
            
            
            if(!$Req_Details->save()){
                return back()->with('error','لم نتمكن من إضافة طلبيتك !!!');
                }
            
  
        }

        return redirect()->route('client-orders')->with('status','تم إرسال الطلبية الى الصيدلية بنجاح');
            
    }


    public function reject($id)
    {
        $order = OrderRequest::where('id',$id)->first();
        $reply = Reply::where('request_id',$id)->first();
        $reply->state = ReplyState::REJECTED;
        $order->state = RequestState::NOT_COMPLETED;
        $reply->update();
        $order->update();
        
        return back()->with('status','لقد تم رفض الطلبية '.$id.' بنجاح');
    }




}
