<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Auth\Register\RegisterController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\WalletController;
use App\Models\Admin;
use App\Models\Advertising;
use App\Models\City;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\OrderPayment;
use App\Models\Payment;
use App\Models\Pharmacy;
use App\Models\Reply;
use App\Models\zone;
use Illuminate\Http\Request;
use App\Models\Request as OrderRequest;
use App\Models\User;
use App\Utils\DeleveryState;
use App\Utils\ReplyState;
use App\Utils\RequestState;
use App\Utils\SystemUtils;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\Cast\Object_;

class PaymentController extends Controller
{
    /**
     * The index function which is used for posting the data to the api
     */

    public static function getProducts($id)
    {
        try {

            $request = OrderRequest::with(['details', 'replies.details'])
                ->where(['client_id' => Auth::id(), 'id' => $id])->first();

            if (!$request)
                return redirect()->route('index')->with('error', 'طلبيتك غير موجودة');

            // if ( in_array($request->state, [RequestState::ACCEPTED , RequestState::ACCEPTED)
            //     return redirect()->route('index')->with('error', 'طلبية غير صالحة للدفع');


            $total_products = $request->replies->details->where('state', 1)->count();
            $products = [];
            $total_price = 0;
            foreach ($request->details as $reqDetails)
                foreach ($request->replies->details as $repDetails)
                    if ($reqDetails->id == $repDetails->request_details_id && $repDetails->state == ReplyState::ACCEPTED) {
                        $product = [];

                        if ($reqDetails->quantity) $product['quantity'] = $reqDetails->quantity;
                        else  return redirect()->route('index')->with('error', 'منتج ليس له كمبة غير مقبول');

                        if ($repDetails->drug_price) {

                            $product['id'] = $reqDetails->id;
                            if ($reqDetails->drug_image) $product['drug_image'] = SystemUtils::REQUEST_IMAGE_PATH . $reqDetails->drug_image;
                            if ($reqDetails->drug_title) $product['drug_title'] = $reqDetails->drug_title;
                            $product['drug_price'] = $repDetails->drug_price;
                            $total_price += ($repDetails->drug_price * $reqDetails->quantity);
                        } else if ($repDetails->alt_drug_price) {

                            $product['id'] = $repDetails->id;
                            if ($repDetails->alt_drug_title) $product['drug_title'] = $repDetails->alt_drug_title;
                            if ($repDetails->alt_drug_image) $product['drug_image'] = SystemUtils::REPLY_IMAGE_PATH . $repDetails->alt_drug_image;
                            $product['drug_price'] = $repDetails->alt_drug_price;
                            $total_price += ($repDetails->alt_drug_price * $reqDetails->quantity);
                        } else
                            return redirect()->route('index')->with('error', 'منتج غير مسعر غير مقبول');


                        $products[] = $product;
                    }

            return array(
                'order_reference' => $request->id,
                'total_price' => $total_price,
                'total_products' => $total_products,
                'client_id' => $request->client_id,
                'pharmacy_id' => $request->pharmacy_id,
                'products' => $products
            );
        } catch (\Exception $ex) {
            return redirect()->route('index')->with('error', 'حدث خطأ غير متوقع ' . $ex->getMessage());
        }
    }

    public static function getAdvertising($id)
    {
        try {

            $ads = Advertising::with('owner')
                ->where('id', $id)->first();

            if (!$ads)
                return redirect()->route('index')->with('error', 'بيانات غير صحيحة');


            $total_products = 1;
            $total_price = 0;
            $products = [];
            $product = [];
            $product['id'] = $ads->id;
            $product['quantity'] = 1;
            if ($ads->price) {
                $product['drug_price'] = $total_price = $ads->price;
            }
            if ($ads->descripe) $product['drug_title'] = $ads->descripe;
            if ($ads->image) $product['drug_image'] = "ads/" . $ads->image;

            $products[] = $product;


            return array(
                'order_reference' => $ads->id,
                'total_price' => $total_price,
                'total_products' => $total_products,
                'client_id' => $ads->owner->id,
                'pharmacy_id' => $ads->owner->id,
                'products' => $products,
                'is_advertising' => true,
                'ads_owner' => $ads->owner
            );
        } catch (\Exception $ex) {
            return redirect()->route('index')->with('error', 'حدث خطأ غير متوقع ' . $ex->getMessage());
        }
    }

    public function index($id)
    {
        return view('payment.payment', [
            'cities' => City::get(),
            'zones' => zone::get(),
            'request' => self::getProducts($id),
        ]);
    }

    public function index2($id)
    {
        return view('payment.payment', [
            'cities' => City::get(),
            'zones' => zone::get(),
            'request' => self::getAdvertising($id),
        ]);
    }

    public function pay(Request $request, $id)
    {
        $order = self::getProducts($id);
        if ($request->has('is_advertising'))
            $order = self::getAdvertising($id);

        $products = [];
        foreach ($order['products'] as $product) {
            if (!isset($product['drug_title'])) $product['drug_title'] = "Test";
            $products[] = array(
                "id" => $product['id'],
                "product_name" => $product['drug_title'],
                "quantity" => $product['quantity'],
                "unit_amount" => $product['drug_price']
            );
        }
        $success = "http://127.0.0.1:8000/user/payment/success";
        $cancel = "http://127.0.0.1:8000/user/payment/cancel";
        if ($request->has('is_advertising')) {
            $success = "http://127.0.0.1:8000/user/payment/ads/success";
            $cancel = "http://127.0.0.1:8000/user/payment/ads/cancel";
        }

        $data = [
            "order_reference" => $order['order_reference'],
            "products" => $products,
            "currency" => "YER",
            "total_amount" => $order['total_price'],
            "success_url" => $success,
            "cancel_url" => $cancel,
            "metadata" => [
                "name" => $request->name,
                "email" => $request->email,
                "address" => $request->address ? $request->address : "",
                "city" => $request->city ? $request->city : "",
                "zone" => $request->zone ? $request->zone : "",
                "client_id" => $order['client_id'],
                "pharmacy_id" => $order['pharmacy_id'],
                "is_advertising" => $request->has('is_advertising') ? true : false
            ]

        ];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://waslpayment.com/api/v1/merchant/payment_order",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                "private-key:" . env('PRIVATE_KEY'),
                "public-key:" . env('PUBLIC_KEY'),
                "Content-Type:  application/x-www-form-urlencoded"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            echo " Error #:" . $err;
        }
        // todo success Case => should make it function latter
        else {

            $response = json_decode($response, true);
            return redirect($response['invoice']['next_url']);
        }
    }


    /**
     * This function is used to show the success page with the amount and the other details
     */
    public function success()
    {
        try {

            // Decode Recived data
            $info = Route::current()->parameter('info');
            $data =  base64_decode($info);
            $data =  json_decode($data, true);
            $products = json_decode($data['products'], true);
            $client_info = json_decode($data['meta_data'], true);
            $paid_amount = $data['customer_account_info']['paid_amount'];
            $order_reference = $data['order_reference'];
            $card_type = $data['customer_account_info']['card_type'];
            $card_holder = $data['customer_account_info']['card_holder'];
            $created_at = $data['customer_account_info']['created_at'];
            $pharmacy_id = $client_info['pharmacy_id'];


            if (isset($client_info['is_advertising']) && $client_info['is_advertising']) {

                $reciver = User::find(Admin::first()->user_id);
                // Create Wallet To User with the name of the wasel bank
                RegisterController::createWallet($reciver);
                $reciver->wallet->name = $card_type;

                // Deposite the mony to reciver wallet andn notify him
                $reciver->deposit(floatval($paid_amount), ['meta' => $products]);
                WalletController::notifyDeposit(
                    $reciver,
                    WalletController::depositMessage($card_holder, $reciver, floatval($paid_amount))['reciver_message'],
                    $products
                );

                $adds = Advertising::find($order_reference)->first();
                $adds->is_active = 1;
                $adds->update();

                return view('payment.successPay', [
                    'client' => $client_info,
                    'pharmacy' => $client_info,
                    'order_reference' => $order_reference,
                    'products' => $products,
                    'paid_amount' => $paid_amount,
                    'created_at' => Carbon::parse($created_at)->diffForHumans(),
                    'is_advertising' => true
                ]);
            }

            // get users Info
            $sender = Auth::user();
            $reciver = User::find(Admin::first()->user_id);
            $target_user = User::find($pharmacy_id);



            // Insert Order To DataBase

            $order = new Order();
            $order->admin_id = $reciver->id;
            $order->pharmacy_id = $target_user->id;
            $order->order_reference = $order_reference;
            $order->total_price = floatval($paid_amount);

            if (!$order->save()) {
                return redirect()->route('index')->with('error', 'order not saved !!!');
            }

            $order_details_saved = true;
            $order_payment = new OrderPayment();
            $order_payment->client_id = $sender->id;
            $order_payment->admin_id = $reciver->id;
            $order_payment->order_id = $order->id;
            if (!$order_payment->save()) {
                return redirect()->route('index')->with('error', 'order_payment not saved !!!');
            }

            foreach ($products as $product) {
                $order_details = new OrderDetails();
                $order_details->order_id = $order->id;
                $order_details->drug_image = $product['product_name'];
                $order_details->drug_title = $product['product_name'];
                $order_details->quantity = $product['quantity'];
                $order_details->drug_price = $product['unit_amount'];
                if (!$order_details->save()) {
                    $order_details_saved = false;
                    break;
                }
            }

            if (!$order_details_saved) {
                return redirect()->route('index')->with('error', 'one order details not saved !!!');
            }

            // Create Wallet To User with the name of the wasel bank
            RegisterController::createWallet($sender);
            $sender->wallet->name = $card_type;

            // Deposite the mony to client wallet andn notify him
            $sender->deposit(floatval($paid_amount));
            WalletController::notifyDeposit(
                $sender,
                WalletController::depositMessage($card_holder, $sender, floatval($paid_amount))['reciver_message'],
                $products
            );

            // Make Payment from client to admin 
            WalletController::pay($sender, $reciver, floatval($paid_amount), $target_user->id, 0, $products);

            $request = OrderRequest::find($order_reference);
            $request->state = RequestState::WAIT_DELIVERY;
            $request->update();
            return view('payment.successPay', [
                'client' => $client_info,
                'pharmacy' => $target_user,
                'order_reference' => $order_reference,
                'products' => $products,
                'paid_amount' => $paid_amount,
                'created_at' => Carbon::parse($created_at)->diffForHumans()
            ]);
        } catch (\Exception $ex) {
            // return redirect()->route('index')->with('error', 'حصلت مشكلة غير متوقعة عند اكتمال الدفع من الموقع' . $ex->getMessage());
            return $ex;
        }
    }


    public function completePay($id)
    {
        try {
            $order = OrderRequest::where('id', $id)->first();
            $reply = Reply::where('request_id', $id)->first();
            $order_paid = Order::where('order_reference', $id)->first();
            $order_payment = OrderPayment::where('order_id', $order_paid->id)->first();

            $sender = User::where('id',$order_paid->admin_id)->first();
            $reciever = User::where('id',$order_paid->pharmacy_id)->first();
            $data = self::getProducts($id);
            // Make Payment from admin to pharmacy
            $paied = WalletController::pay($sender, $reciever, 
            floatval($data['total_price']), $order_payment->client_id, 0.10, 
            $data['products']);

            if($paied)
            {
                $reply->state = ReplyState::ACCEPTED;
                $order->state = RequestState::FINISHED;
                $reply->update();
                $order->update();
    
                $order_paid->rejected = 0;
                $order_paid->update();
    
                $order_payment->delivery_state = DeleveryState::DELIVERED;
                $order_payment->update();
                return true;
            }
            else
            return false;
        } catch (\Exception $ex) {
            return redirect()->route('index')->with('error', 'حصلت مشكلة غير متوقعة عند اكتمال الدفع من الموقع' . $ex->getMessage());
        }
    }



    /**
     * This function is used to show the cancel page 
     */
    public function cancel()
    {
        return view(
            'payment.cancelPay',
            [
                'cities' => City::get(),
                'zones' => zone::get()
            ]
        );
    }
}
