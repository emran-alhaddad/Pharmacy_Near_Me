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

            $from_user = DB::table('users')
                ->select('users.name')
                ->where('users.id', '=', 'transactions.payable_id');

            $to_user = DB::table('users')
                ->select('users.name')
                ->join('wallets', 'wallets.holder_id', '=', 'users.id')
                ->where('transfers.to_id', '=', 'wallets.id');


            // return DB::table("wallets")
            // ->select(['transactions.amount','wallets.slug'])
            // ->selectSub($from_user,'from_user')
            // ->selectSub($to_user,'to_user')
            // ->join('transactions','transactions.wallet_id','=','wallets.id')
            // ->join('transfers','transfers.from_id','=','wallets.id')
            // ->join('users','users.id','=','transfers.to_id')
            // ->whereIn('transactions.id',['transfers.deposit_id','transfers.withdraw_id'])
            // ->where('wallets.holder_id','=',Auth::id())->toSql();

            // return DB::table("wallets")
            // ->select(['transactions.amount','wallets.slug'])
            // ->selectSub('SELECT users.name FROM users WHERE users.id = transactions.payable_id','from_user')
            // ->selectSub('SELECT users.name FROM users INNER JOIN wallets ON wallets.holder_id = users.id WHERE wallets.id = transfers.to_id','to_user')
            // ->join('transactions','transactions.wallet_id','=','wallets.id')
            // ->join('transfers','transfers.from_id','=','wallets.id')
            // ->join('users','users.id','=','transfers.to_id')
            // ->where('wallets.holder_id',Auth::id())
            // ->whereIn('transactions.id',array('transfers.deposit_id','transfers.withdraw_id'))->toSql();

            Auth::user()->balance;
            $transactions = DB::table('transactions')
                ->where(['payable_id' => Auth::id()])->get();

            $transfers = null;
            if (!$transactions->isEmpty())
                $transfers = DB::table('transfers')
                    ->where(['uuid' => $transactions[0]->uuid])->get();

            if (Auth::user()->hasRole('admin'))
                return view(
                    'admin.wallet.index',
                    ['transactions' => $transactions, 'transfers' => $transfers]
                );

            else if (Auth::user()->hasRole('pharmacy'))
                return view(
                    'pharmacy.account.bag',
                    [
                        'transactions' => $transactions, 'transfers' => $transfers,
                        'user' => User::with('client')->where('id', Auth::id())->firstOrFail()
                    ]
                );

            else
                return view(
                    'user.bag',
                    [
                        'transactions' => $transactions, 'transfers' => $transfers,
                        'user' => User::with('client')->where('id', Auth::id())->firstOrFail()
                    ]
                );
        } else
            return redirect()->route('login')->with('error', 'يجب عليك تسجيل الدخول');
    }

    public static function pay(User $from, User $to, $amount, $target_user, $tax = 0, $products = [])
    {
        try {

            if ($from->balance <= 0) return "Low Cash"; //return back()->with('error','النقدية منخفضة');
            $list_products = "";
            if ($tax != 0) {
                $amount = $amount - $amount * $tax;
                $list_products .= "وذلك مقابل الطلبية التالية";
                $list_products .= " <br> <ol>";
                foreach ($products as $product) {
                    $list_products .= "<li>" . $product['drug_title'] . " : " . $product['quantity'] . " -------- " . $product['drug_price'] . "<li>";
                }
                $list_products .= "</ol>";
            }

            $from->transfer($to, $amount, array('message' => $list_products, 'target_user' => $target_user));
            $transfer_msg = self::transferMessages($from, $to, $amount, $list_products);
            self::notifyTransfer($from, $transfer_msg['sender_message']);
            self::notifyTransfer($to, $transfer_msg['reciver_message']);
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


    public static function transferMessages($sender, $reciver, $amount, $products = "")
    {
        return [
            'sender_message' =>
            ' تم تحويل ' . $amount . ' $ من حسابك إلى حساب ' . $reciver->name . " رصيدك " . $sender->balance  . "$" . $products,
            'reciver_message' =>
            'أودع/ ' . $sender->name . '<br> لحسابك ' . $amount . "$  رصيدك " . $reciver->balance . "$" . $products  
        ];
    }

    public static function depositMessage($sender, $reciver, $amount)
    {
        return [
            'reciver_message' =>
            'أودع/ ' . $sender . '<br> لحسابك ' . $amount . "$  رصيدك " . $reciver->balance . "$"
        ];
    }
}
