<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Complaint;

class ComplaintsController extends Controller
{
    //

    public function showComplaints(){
        $complaint = Complaint::with(['pharmacy.user','client.user'])->get();
        return  $complaint;

        // return view('admin.Complaints.show_Complaints');
    }

    public function addComplaints(){
        return view('admin.Complaints.add_Complaints');
    }
    public function relpay(Request $request,$id){
        $affectedRows = User::where('id', $id)->update(array('replay' => $request->relpay));
        if($affectedRows>0)
        {
            return back()->with('secuss','تم الرد على المستخدم');
        }
        return back()->with('error',' لم تم الرد على المستخدم  ');
        

      
    }

    public function editComplaints(){
        return view('admin.Complaints.edit_Complaints');
    }
    
    
}

