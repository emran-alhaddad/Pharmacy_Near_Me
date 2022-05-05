<?php

namespace App\Http\Controllers\User\Complaint;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Complaint;
use Illuminate\Support\Facades\Auth;
class ComplaintController extends Controller
{
    //
    public function index ()
    {
        
    }
    public function AddComplaint(Request $request)
    {  

        $complaint=new Complaint();
         $complaint->client_id=$request->client_id;
         $complaint->pharmacy_id=$request->pharmacy_id;
         $complaint->message=$request->message;
         $complaint->save();


    }

    //function for clients to display All complaints
    public function getComplaint()
    {       $Userid = Auth::id();
         dd($Userid);
            $complaint = DB::table('complaints')
            ->join('pharmacies', 'complaints.id', '=', 'pharmacies.user_id')
            ->join('users', 'users.id', '=', 'pharmacies.user_id')
            ->select('complaints.*', 'users.name ', 'orders.price')
            ->where('complaints.client_id', $id)
            ->get();
          return $complaint; 
    }
    
    //function for Admin to display All complaints
    public function getAllComplaint($id)
    {
        $complaint = DB::table('complaints')
            ->join('pharmacies', 'complaints.id', '=', 'pharmacies.user_id')
            ->join('users', 'users.id', '=', 'pharmacies.user_id')
            ->select('complaints.*', 'users.name ', 'orders.price')
            ->where('complaints.client_id', $id)
            ->get();
          return $complaint; 
    }
}
