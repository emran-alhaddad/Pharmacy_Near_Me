<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class pharmacyController extends Controller
{
    public function Show_index(){
        return view('phar.index');
    }

    public function Show_chat(){
        return view('phar.chat');
    }
}

