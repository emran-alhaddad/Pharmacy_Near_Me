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
      //  return  $complaint;

         return view('admin.Complaints.show_Complaints')->with('coms',$complaint);
    }
    // public function createComplaints(Request $request)
    // {

    // }
    public function addComplaints($id){
        return view('admin.Complaints.add_Complaints')->with('id',$id);;
    }
    public function relpay(Request $request,$id){
      
        $affectedRows = Complaint::where('id', $id)->update(array('replay' => $request->replay));
        if($affectedRows>0)
        {
            return back()->with('status','تم الرد على المستخدم');
        }
        return back()->with('error',' لم تم الرد على المستخدم  ');
        

      
    }

    public function editComplaints(){
        return view('admin.Complaints.edit_Complaints')->with($id);;
    }
    
    
}

