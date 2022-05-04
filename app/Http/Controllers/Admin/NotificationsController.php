<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    //

    public function showNotifications(){
        return view('admin.Notifications.show_Notifications');
    }

    public function addNotifications(){
        return view('admin.Notifications.add_Notifications');
    }

    public function editNotifications(){
        return view('admin.Notifications.edit_Notifications');
    }
}
