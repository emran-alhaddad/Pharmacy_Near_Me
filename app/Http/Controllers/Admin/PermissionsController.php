<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{
    //

    public function showPermissions(){
        return view('admin.Permissions.show_Permissions');
    }

}
