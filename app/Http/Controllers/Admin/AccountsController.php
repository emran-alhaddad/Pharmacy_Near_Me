<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    //

    public function showAccounts(){
        return view('admin.Accounts.show_Accounts');
    }

    public function addAccounts(){
        return view('admin.Accounts.add_Accounts');
    }

    public function editAccounts(){
        return view('admin.Accounts.edit_Accounts');
    }
}
