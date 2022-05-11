<?php

namespace App\Http\Controllers\Pharmacy;

use App\Http\Controllers\Controller;
use App\Models\Pharmacy;
use App\Models\Reply;
use App\Models\Reply_Details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Request as OrderRequest;
use App\Models\Request_Details;
use App\Models\User;
use App\Utils\ReplyState;
use App\Utils\RequestState;

class PharmacyController extends Controller
{
    public function index()
    {
        return view('pharmacy.index', [
            'pharmacy' => Pharmacy::with(['user', 'zone.city'])->where('user_id', Auth::user()->id)->first()
        ]);
    }
    // pharmacy views
    public function account()
    {
        return view('pharmacy.account.pharmacyAccunt');
    }
    public function settings()
    {
        return view('pharmacy.account.pharmacySettings');
    }

    public function orders()
    {

        $requests = OrderRequest::with(['details', 'client.user'])
            ->where('pharmacy_id', Auth::id())->orderByDesc('updated_at')->get();

        return view('pharmacy.orders.manageOrders', [
            'requests' => $requests
        ]);
    }

    public function detailes($id)
    {
        $request = OrderRequest::with(['details', 'client.user'])
            ->where('id', $id)->orderByDesc('updated_at')->first();

        return view('pharmacy.orders.orderDetailes', [
            'request' => $request
        ]);
    }

    public function reply(Request $request, $id)
    {
        if (empty($request['data']))
            return back()->with('error', 'يجب عليك أولا إضافة الردود قبل إرسالها ');

        $allReplies = $request['data'];
        $message = $request["message"];

        $reply = new Reply();
        $reply->request_id = $id;
        $reply->message = $message;
        $reply->save();



        $obj_json_durg = json_decode($allReplies);
        $allReplies = $obj_json_durg->data;

        $all_replies_saved = false;
        foreach ($allReplies as $oneReply) {
            $Rep_Details = new Reply_Details();
            $Rep_Details->reply_id = $reply->id;
            $Rep_Details->request_details_id = $oneReply->request_details_id;

            if (isset($oneReply->drug_price)) {
                $Rep_Details->drug_price = $oneReply->drug_price;
            } else if (isset($oneReply->alt_drug_title) || isset($oneReply->alt_drug_image)) {
                if (isset($oneReply->alt_drug_image)) $Rep_Details->alt_drug_image = $oneReply->alt_drug_image;
                else $Rep_Details->alt_drug_title = $oneReply->alt_drug_title;
                $Rep_Details->alt_drug_price = $oneReply->alt_drug_price;
                
            } else {
                return back()->with('error', 'يجب تحديد تسعيرة او اقتراح بديل');
            }

                if ($Rep_Details->save())
                $all_replies_saved = true;
                else
                $all_replies_saved = false;
        }

        $order_req = OrderRequest::where('id', $id)->first();
        $order_req->state = RequestState::ACCEPTED;

        if ($order_req->update()) {
            
            if($all_replies_saved)
            return redirect()->route('pharmacy-orders')->with('status', 'تم إرسال الرد الى العميل بنجاح');
            else
            return back()->with('error', 'لم نتمكن من إضافة الرد !!!');
        } else
            return back()->with('error', 'حصل مشكله في اضافة الرد ');
        

        
    }

    public function reject($id)
    {
        $order = OrderRequest::where('id', $id)->first();
        $order->state = RequestState::REJECTED;
        $order->update();

        return redirect()->route('pharmacy-orders')->with('status', 'لقد تم رفض الطلبية ' . $id . ' بنجاح');
    }
}
