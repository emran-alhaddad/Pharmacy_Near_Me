<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    //

    public function showCities(){
        return view('admin.Cities.show_Cities');
    }

    public function addCities(){
        return view('admin.Cities.add_Cities');
    }

    public function editCities(){
        return view('admin.Cities.edit_Cities');
    }
}
