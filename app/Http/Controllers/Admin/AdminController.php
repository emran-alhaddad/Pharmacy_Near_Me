<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function showPharmacies(){
        return view('admin.phar');
    }

    public function showUsers(){
        return view('admin.user');
    }

    public function showNotifications(){
        return view('admin.notifications');
    }

    public function showProfile(){
        return view('admin.admin_profile.show_profile');
    }

    public function editProfile(){
        return view('admin.admin_profile.edit_profile');
    }


}
