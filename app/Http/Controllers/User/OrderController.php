<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Payment\PaymentController;
use App\Models\Order;
use App\Models\OrderPayment;
use App\Models\Pharmacy;
use App\Models\Reply;
use App\Models\Reply_Details;
use App\Models\Request_Details;
use App\Models\User;
use App\Models\Request as OrderRequest;
use App\Utils\DeleveryState;
use App\Utils\ReplyState;
use App\Utils\RequestState;
use App\Utils\SystemUtils;
use Illuminate\Http\Request;
use App\Http\Controllers\Notify\NotificationsController;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    public function index()
    {

        $requests = OrderRequest::with(['details', 'pharmacy.user', 'replies.details'])
            ->where('client_id', Auth::id())->orderByDesc('id')->get();
        $client = User::with('client')->where('id', Auth::id())->firstOrFail();
        $pharmacies = Pharmacy::with('user')->get();
        return view('user.myorder', [
            'requests' => $requests,
            'user' => $client,
            'pharmacies' => $pharmacies
        ]);
    }

    public function create()
    {
        $client = User::with('client')->where('id', Auth::id())->firstOrFail();
        return view('user.order.add', [
            'user' => $client
        ]);
    }

    public function store(Request $request)
    {
                
        if (empty($request['data']))
            return back()->with('error', 'يجب عليك أولا إضافة الطلبية قبل إرسالها ');

        $allDurg = $request['data'];
        $paramicy = $request['pharmacy_id'];
        $client = $request["client_id"];

        $req = new OrderRequest();
        $req->client_id = $client;
        $req->pharmacy_id = $paramicy;
        $req->save();

        $id = $req->id;

        $obj_json_durg = json_decode($allDurg);
        $allDurg = $obj_json_durg->data;

        if ($request->hasFile('images')) {

            $images = SystemUtils::addImages($request, SystemUtils::REQUEST_IMAGE_PATH);
            $images = array_reverse($images);
        }

        foreach ($allDurg as $durg) {
            $Req_Details = new Request_Details();

            $Req_Details->request_id = $id;
            if (isset($durg->drug_title)) $Req_Details->drug_title = $durg->drug_title;
            if (isset($durg->drug_image)) $Req_Details->drug_image = array_pop($images);
            if (isset($durg->quantity)) $Req_Details->quantity = $durg->quantity;

            $Req_Details->accept_alternative = $durg->accept_alternative;

            if (isset($durg->repeat_until)) $Req_Details->repeat_until = $durg->repeat_until;
            if (isset($durg->repeat_every)) $Req_Details->repeat_every = $durg->repeat_every;


            if (!$Req_Details->save()) {
                return back()->with('error', 'لم نتمكن من إضافة طلبيتك !!!');
            }
        }
        $Notify = new NotificationsController();
        $Notify -> AddOrderToParNotification( $paramicy,$client,$id);

        return redirect()->route('client-orders')->with('status', 'تم إرسال الطلبية الى الصيدلية بنجاح');
    }

    public function reject($id, $msg = "")
    {
        $order = OrderRequest::where('id', $id)->first();
        $reply = Reply::where('request_id', $id)->first();
        $reply->state = ReplyState::REJECTED;
        $order->state = RequestState::NOT_COMPLETED;
        $reply->update();
        $order->update();

        if ($msg) {
            $order_paid = Order::where('order_reference', $id)->first();
            $order_paid->rejected = 1;
            $order_paid->update();

            $order_payment = OrderPayment::where('order_id', $order_paid->id)->first();
            $order_payment->delivery_state = DeleveryState::REJECTED;
            $order_payment->update();
        }
        // $Notify = new NotificationsController();
        // $Notify -> rejectUserOrderNotification($id);
        return back()->with('status', 'لقد تم رفض الطلبية ' . $id  . $msg . ' بنجاح');
    }


    public function delivered($id)
    {
        $payment = new PaymentController();
        if($payment->completePay($id))
        {
        $Notify = new NotificationsController();
        $Notify -> ConfirmArrivalOrderAfterPayment($id);
        return back()->with('status', 'لقد تم تأكيد وصول الطلبية ' . $id  . ' بنجاح');
        }
        return back()->with('error', 'لم يتم تأكيد وصول الطلبية ' . $id );
    }

    public function toggleReplyDetails($id, $state)
    {

        $reply_detail = Reply_Details::where('id', $id)->first();
        switch ($state) {
            case ReplyState::REJECTED:
                $reply_detail->state = ReplyState::REJECTED;
                break;
            case ReplyState::ACCEPTED:
                $reply_detail->state = ReplyState::ACCEPTED;
                break;
            default:
                $reply_detail->state = ReplyState::WAIT_ACCEPTANCE;
        }

        $reply_detail->update();
        $request_id = Request_Details::where('id',$reply_detail->request_details_id)->first()->request_id;
        return PaymentController::getProducts($request_id )['total_price'];
    }

    public function returnAccepttouser($id,$stateTap)
    { 
    //     $requests = OrderRequest::with(['details', 'pharmacy.user', 'replies.details'])
    //     ->where('requests.id',$id)->get();
    //    // return $requests[0]->pharmacy_id; 
    // $client = User::with('client')->where('id', $requests[0]->client_id)->firstOrFail();
    // $pharmacies = Pharmacy::with('user')->where('user_id', $requests[0]->pharmacy_id)->get();
    return redirect()->route('client-orders')->with( ['tapState' => $stateTap] );
   
    // return redirect()->route('myorder')->with('tapState', $stateTap);

    }

}
