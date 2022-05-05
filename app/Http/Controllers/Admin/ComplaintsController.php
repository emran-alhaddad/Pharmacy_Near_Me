<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ComplaintsController extends Controller
{
    //

    public function showComplaints(){
        return view('admin.Complaints.show_Complaints');
    }

    public function addComplaints(){
        return view('admin.Complaints.add_Complaints');
    }

    public function editComplaints(){
        return view('admin.Complaints.edit_Complaints');
    }
}

