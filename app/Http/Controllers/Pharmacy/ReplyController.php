<?php

namespace App\Http\Controllers\Pharmacy;

use App\Http\Controllers\Controller;
use App\Models\Reply;
use App\Models\Request as OrderRequest;
use App\Utils\ReplyState;
use Illuminate\Http\Request;
use App\Utils\RequestState;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    public function index()
    {
        return OrderRequest::with('client.user')
            ->where('state', RequestState::WAIT_ACCEPTANCE)
            ->where('pharmacy_id', Auth::user()->id)->get();
    }

    public function showRequest($request_id)
    {
        return OrderRequest::with(['client.user', 'details'])
            ->where('pharmacy_id', Auth::user()->id)
            ->where('id', $request_id)->first();
    }

    public function showReplies($request_id)
    {
        return OrderRequest::with(['client.user', 'details', 'replies'])
            ->where('pharmacy_id', Auth::user()->id)
            ->where('state', RequestState::ACCEPTED)
            ->where('id', $request_id)->get();
    }


    public function create(Request $request)
    {
        if(!Request::where('id',$request->id)->where('state',RequestState::ACCEPTED)->first())
        return back()->with('status',"can't add reply for un-accepted request !!!");

        $this->validatReply($request);
        $reply = new Reply();
        $reply->request_id = $request->id;
        $reply->state = ReplyState::WAIT_ACCEPTANCE;
        $request->has('message')? $reply->message = $request->message: null;

        if($reply->save())
        {

        }
        else
        return back()->with('status',"error! reply not added");
    }

    public function acceptRequest($request_id)
    {
        return OrderRequest::where('id', $request_id)
            ->update(['state' => RequestState::ACCEPTED]);
    }

    private function validatReply(Request $request)
    {

    }
}
