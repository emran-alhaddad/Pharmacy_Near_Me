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
        if(Auth::check())
        {
            Auth::user()->balance;
            $transactions = DB::table('transactions')
            ->where(['payable_id'=>Auth::id()])->get();

            $transfers = null;
            if(!$transactions->isEmpty())
            $transfers = DB::table('transfers')
            ->where(['uuid'=>$transactions[0]->uuid])->get();
            
            if(Auth::user()->hasRole('admin'))
            return view('admin.wallet.index',
            ['transactions' => $transactions , 'transfers' => $transfers]);

            else if(Auth::user()->hasRole('pharmacy'))
            return view('pharmacy.account.bag',
            ['transactions' => $transactions , 'transfers' => $transfers,
            'user' => User::with('client')->where('id', Auth::id())->firstOrFail()]);
            
            else 
            return view('user.bag',
            ['transactions' => $transactions , 'transfers' => $transfers,
        'user' => User::with('client')->where('id', Auth::id())->firstOrFail()]);
        }
        else
        return redirect()->route('login')->with('error','يجب عليك تسجيل الدخول');
    }

    public static function pay(User $from , User $to , $amount , $tax=0 ,$products="")
    {
        if($from->balance <= 0) return "Low Cash"; //return back()->with('error','النقدية منخفضة');
        if($tax!=0)
        { $amount = $amount - $amount * $tax;
            $products = "وذلك مقابل الطلبية التالية "." 2 معجون أسنان سجنال و 3 عبوات ديتول صغيرة";
        }

        $from->transfer($to, $amount);
        self::notify($from,'لقد تم تحويل '.$amount.' $ من حسابك إلى حساب '.$to->name . $products);
        self::notify($to,'لقد تم إيداع '.$amount.' $ إلى حسابك من حساب '.$from->name . $products);
        $from->wallet->refreshBalance();
        $to->wallet->refreshBalance();
        return "Done";
        
    }

    
    public static function notify(User $user , $data)
    {
        $email_data = [
            'name'=>$user->name,
            'message' => $data
        ];
        Mail::to($user->email)->send(new NotificationEmail($email_data));
    }
}


