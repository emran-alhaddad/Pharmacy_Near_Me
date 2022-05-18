<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Auth\Register\RegisterController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\WalletController;
use App\Models\Admin;
use App\Models\City;
use App\Models\Payment;
use App\Models\Pharmacy;
use App\Models\zone;
use Illuminate\Http\Request;
use App\Models\Request as OrderRequest;
use App\Models\User;
use App\Utils\ReplyState;
use App\Utils\RequestState;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\Cast\Object_;

class PaymentController extends Controller
{
    /**
     * The index function which is used for posting Our Order data to the api
     */

    public static function getProducts($id)
    {
        try {

            $request = OrderRequest::with(['details', 'replies.details'])
                ->where(['client_id' => Auth::id(), 'id' => $id])->first();

            if (!$request)
                return redirect()->route('index')->with('error', 'طلبيتك غير موجودة');

            if ($request->state != RequestState::ACCEPTED)
                return redirect()->route('index')->with('error', 'طلبية غير صالحة للدفع');


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
                            if ($reqDetails->drug_image) $product['drug_image'] = $reqDetails->drug_image;
                            if ($reqDetails->drug_title) $product['drug_title'] = $reqDetails->drug_title;
                            $product['drug_price'] = $repDetails->drug_price;
                            $total_price += ($repDetails->drug_price * $reqDetails->quantity);
                        } else if ($repDetails->alt_drug_price) {

                            $product['id'] = $repDetails->id;
                            if ($repDetails->alt_drug_title) $product['drug_title'] = $repDetails->alt_drug_title;
                            if ($repDetails->alt_drug_image) $product['drug_image'] = $repDetails->alt_drug_image;
                            $product['drug_price'] = $repDetails->alt_drug_price;
                            $total_price += ($repDetails->alt_drug_price * $reqDetails->quantity);
                        } else
                            return redirect()->route('index')->with('error', 'منتج غير مسعر غير مقبول');


                        $products[] = $product;
                    }
            // ! The return value of the order_reference from the api is 0, So that our order data dosn't return back
            return array(
                'order_reference' => $request->id,
                'total_price' => $total_price,
                'total_products' => $total_products,

                'products' => $products
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

    public function pay(Request $request, $id)
    {
        $order = self::getProducts($id);
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
        $data = [
            "order_reference" => $order['order_reference'],
            "products" => $products,
            "currency" => "YER",
            "total_amount" => $order['total_price'],
            "success_url" => "http://127.0.0.1:8000/user/payment/success",
            "cancel_url" => "http://127.0.0.1:8000/user/payment/cancel",
            "metadata" => [
                "Customer name" => Auth::user()->name,
                "order id" => 0
            ]

        ];
        // return $data;

        // connect To the server block start
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://waslpayment.com/api/test/merchant/payment_order",
            CURLOPT_RETURNTRANSFER => true,
            // CURLOPT_ENCODING => "",
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
        // connection To the server end

        // error Case
        if ($err) {
            echo " Error #:" . $err;
        }
        // TODO success Case => better make it function latter
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

            $info = Route::current()->parameter('info');
            $data =  base64_decode($info);
            $data =  json_decode($data, true);

            for ($i = 0; $i < count($data); $i++) {
                $status = array_column($data, 'status');
                $paid_amount = array_column($data, 'paid_amount');
                $card_holder = array_column($data, 'card_holder');
                $card_type = array_column($data, 'card_type');
                $created_at = array_column($data, 'created_at');
                $updated_at = array_column($data, 'updated_at');
            }
            $card_type = str_replace('+', ' ', $card_type[0]);
            $card_holder = str_replace('+', ' ', $card_holder[0]);

            $paid_amount = $paid_amount[0];
            $sender = Auth::user();
            $reciver = User::find(Admin::first()->user_id);

            RegisterController::createWallet($sender);
            $sender->wallet->name = $card_type;
            $sender->deposit(floatval($paid_amount));
            WalletController::notifyDeposit(
                $sender,
                WalletController::depositMessage($card_holder, $sender, floatval($paid_amount))['reciver_message']
            );
            WalletController::pay($sender, $reciver, floatval($paid_amount), 1, 0, []);

            return view('payment.successPay', compact('paid_amount', 'status', 'card_holder', 'card_type', 'created_at'));
        } catch (\Throwable $th) {
            return redirect()->route('index')->with('error', 'حصلت مشكلة غير متوقعة عند اكتمال الدفع من الموقع');
        }
    }


    /**
     * This function is used to show the cancel page with
     * @param cancel
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
