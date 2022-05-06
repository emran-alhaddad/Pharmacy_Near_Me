<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentMethodsCotroller extends Controller
{
    //
    public function showPaymentMethods(){
        return view('admin.PaymentMethods.show_PaymentMethods');
    }

    public function addPaymentMethods(){
        return view('admin.PaymentMethods.add_PaymentMethods');
    }

    public function editPaymentMethods(){
        return view('admin.PaymentMethods.edit_PaymentMethods');
    }

}
