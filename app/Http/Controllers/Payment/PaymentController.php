<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Route;

class PaymentController extends Controller
{

    /**
     * This function is used to show the success page with the amount and the other details
     */
    public function showTest()
    {
        $info = Route::current()->parameter('info');

        $data =  base64_decode($info);
        $data =  json_decode($data, true);

        // $data=json_decode($info);
        // $data = $arrayFormat = json_decode($info, true);

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

        return view('payment.successPay');
        // return view('payment.successPay', compact('paid_amount', 'status', 'card_holder', 'card_type', 'created_at'));
    }

    /**
     * This function is used to show the cancel page with
     * @param cancel
     */
    public function testCancel()
    {

        $cancel = Route::current()->parameter('cancel');

        // return $cancel;
        return view('payment.cancelPay');
        //  return view('payment.cancelPay', compact('cancel'));
    }

    public function viewCancel()
    {

        return view('payment.cancelPay');
    }


    /**
     * The index function which is used for posting the data to the api
     */
    public function index()
    {
        $data = [
            "order_reference" => "123412",

            "products" => [
                array(
                    "id" => 1,
                    "product_name" => "charger",
                    "quantity" => 1,
                    "unit_amount" => 1000
                )
            ],
            "currency" => "YER",
            "total_amount" => 1000,
            "success_url" => "http://127.0.0.1:8000/test/response",
            "cancel_url" => "http://127.0.0.1:8000/test/cancel",
            "metadata" => [
                "Customer name" => "hadeel",
                "order id" => 0
            ]

        ];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://waslpayment.com/api/test/merchant/payment_order",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($data),

            CURLOPT_HTTPHEADER => array(

                "private-key: rRQ26GcsZzoEhbrP2HZvLYDbn9C9et",
                "public-key: HGvTMLDssJghr9tlN9gr4DVYt0qyBy",
                "Content-Type:  application/x-www-form-urlencoded"


            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo " Error #:" . $err;
        }
        // success Case => sho;ud make it function latter
        else {
            // return redirect(['']);
            echo $response;

            // return redirect($response['next_url']);
            // return $res = json_encode($response, true);

            // $response = base64_decode($response);
            // trim($root . $path, '/');
            // echo $response;
            // return $res = json_encode($response, true);
        }
    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
