<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function showCustomers(){
        return view('admin.Customer.show_Customers');
    }

    public function addCustomers(){
        return view('admin.Customer.add_Customers');
    }

    public function editCustomers(){
        return view('admin.Customer.edit_Customers');
    }
}
