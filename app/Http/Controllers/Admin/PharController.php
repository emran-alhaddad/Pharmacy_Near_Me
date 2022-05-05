<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PharController extends Controller
{
    //
    public function showPhars(){
        return view('admin.Phars.show_Phars');
    }

    public function addPhars(){
        return view('admin.Phars.add_Phars');
    }

    public function editPhars(){
        return view('admin.Phars.edit_Phars');
    }

}
