<?php

namespace App\Http\Controllers;

use App\Mail\NotificationEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class WalletController extends Controller
{

    public function index()
    {
        if (Auth::check()) {

            Auth::user()->balance;
            $transactions = DB::table('transactions')
                ->where(['payable_id' => Auth::id()])
                ->orderByDesc('id')->get();

            $allTransactions = [];
            $oneTransaction = [];
            foreach ($transactions as $transaction) {
                $meta = json_decode($transaction->meta);

                $oneTransaction['id'] = $transaction->uuid;

                if (isset($meta->card_holder)) $oneTransaction['sender'] = $meta->card_holder;
                else if (isset($meta->to))
                    $oneTransaction['sender'] = User::where('id',$meta->to)->first()->name;
                $oneTransaction['type'] = $transaction->type;
                $oneTransaction['amount'] = abs(floatval($transaction->amount));
                $oneTransaction['date'] = $transaction->created_at;
                $oneTransaction['data'] = $meta->data;
                $allTransactions[] = $oneTransaction;
            }


            if (Auth::user()->hasRole('admin'))
                return view(
                    'admin.wallet.bag',
                    ['transactions' => $allTransactions]
                );

            else if (Auth::user()->hasRole('pharmacy'))
                return view(
                    'pharmacy.account.bag',
                    [
                        'transactions' => $allTransactions,
                        'user' => User::with('client')->where('id', Auth::id())->firstOrFail()
                    ]
                );

            else
                return view(
                    'user.bag',
                    [
                        'transactions' => $allTransactions,
                        'user' => User::with('client')->where('id', Auth::id())->firstOrFail()
                    ]
                );
        } else
            return redirect()->route('login')->with('error', 'يجب عليك تسجيل الدخول');
    }

    public static function pay(User $from, User $to, $amount, $target_user, $tax = 0, $products = [])
    {
        try {

            if ($from->balance <= 0) return back()->with('error', 'النقدية منخفضة');
            if ($tax != 0) {
                $amount = $amount - ($amount * $tax);
                $transfer_msg = self::transferMessages(
                    $from,
                    $to,
                    $amount,
                    $products,
                    User::where('id', $target_user)->first()->name
                );
            } else
                $transfer_msg = self::transferMessages($from, $to, $amount, $products);


            self::notifyTransfer($from, $transfer_msg['sender_message']);
            self::notifyTransfer($to, $transfer_msg['reciver_message']);

            $from->transfer($to, $amount, array(
                'data' =>
                self::formateData($products, $amount),
                'from' => $from->id,
                'to' => $target_user,
                'target_user' => $to->id
            ));

            $from->wallet->refreshBalance();
            $to->wallet->refreshBalance();
            return true;
        } catch (\Exception $ex) {
            return false;
        }
    }


    public static function notifyTransfer(User $user, $data)
    {
        $email_data = [
            'name' => $user->name,
            'message' => $data
        ];
        Mail::to($user->email)->send(new NotificationEmail($email_data));
    }

    public static function notifyDeposit(User $user, $data)
    {
        $email_data = [
            'name' => $user->name,
            'message' => $data
        ];
        Mail::to($user->email)->send(new NotificationEmail($email_data));
    }


    public static function transferMessages($sender, $reciver, $amount, $products = [], $actual_sender = "")
    {
        return [
            'sender_message' =>
            ' تم تحويل ' . $amount .
                ' $ من حسابك إلى حساب ' .
                $reciver->name . " رصيدك " .
                ($sender->balance - floatval($amount))  .
                "$" . self::formateData($products, $amount),
            'reciver_message' =>
            'أودع/ ' .
                ($actual_sender ? $actual_sender : $sender->name) .
                '<br> لحسابك ' . $amount . "$  رصيدك " .
                ($reciver->balance + floatval($amount)) .
                "$" . self::formateData($products, $amount)
        ];
    }

    public static function depositMessage($sender, $reciver, $amount, $data = [])
    {

        return [
            'reciver_message' =>
            'أودع/ ' . $sender . '<br> لحسابك ' .
                $amount . "$  رصيدك " .
                ($reciver->balance + floatval($amount)) . "$"  .
                self::formateData($data, $amount)
        ];
    }

    public static function formateData($data, $amount)
    {
        try {
            $products = "";
            foreach ($data as $product) {
                $products .= "<tr>";
                if (isset($product['product_name'])) $products .= "<td><strong>" . $product['product_name'] . "</strong></td>";
                if (isset($product['drug_image'])) $products .= "<td><strong> منتج ذو صورة </strong></td>";
                else if (isset($product['drug_title'])) $products .= "<td><strong>" . $product['drug_title'] . "</strong></td>";
                
                if (isset($product['quantity'])) $products .= "<td>" . $product['quantity'] . "</td>";
                if (isset($product['unit_amount'])) $products .= "<td>" . $product['unit_amount'] . "</td>";
                if (isset($product['drug_price'])) $products .= "<td>" . $product['drug_price'] . "</td>";
                $products .= "</tr>";

                if (end($data) == $product)
                    $products .= "<tr> <td colspan='10' style='text-align:center'> التكلفة الإجمالية  ( " . $amount . "$ )  </td></tr>";
            }

            if ($products != "")
                $products = "<br> وذلك مقابل <br>" .
                    "<table border=1 class='table table-hover'>
                <thead>
                        <tr>
                            <th>الطلبية</th>
                            <th> الكمية</th>
                            <th>سعر الوحدة</th>
                        </tr>
                    </thead>    
                <tbody>"
                    . $products .
                    "</table>";

            return $products;
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
