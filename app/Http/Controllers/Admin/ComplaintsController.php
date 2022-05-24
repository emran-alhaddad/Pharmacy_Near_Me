<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Payment\PaymentController;
use App\Http\Controllers\User\OrderController;
use Illuminate\Http\Request;

use App\Models\Complaint;
use App\Models\Request as OrderRequest;

class ComplaintsController extends Controller
{
    //

    public function showComplaints()
    {
        $complaint = Complaint::with(['pharmacy.user', 'client.user'])->get();
        return view('admin.Complaints.show_Complaints')->with('coms', $complaint);
    }

    public function showalert($id)
    {
        $complaint = Complaint::with(['pharmacy.user', 'client.user'])->where('id', $id)->get();
        // return $complaint;
        return view('admin.Complaints.show_Complaints')->with('coms', $complaint);
    }
    // public function createComplaints(Request $request)
    // {

    // }
    public function addComplaints($id)
    {
        return view('admin.Complaints.add_Complaints')->with('id', $id);
    }

    public function relpay(Request $request, $id)
    {

        $request->validate(['replay' => 'required|min:3'], [

            'replay.required' => 'لا يمكن الرد على الشكوى برسالة فارغة  ',
            'replay.min' => 'يجب ان يكون طول نص الرد على الأقل 3 احرف',

        ]);

        $affectedRows = Complaint::where('id', $id)->update(array('replay' => $request->replay));
        if ($affectedRows > 0) {
            $payment = new PaymentController();

            if ($request->orderMony == "client") {
                if ($payment->undoPay(Complaint::where('id', $id)->first()->order_reference))
                    return redirect()->route('admin-show_Complaints')->with('status', 'تم الرد على المستخدم وإرجاع المبلغ للمستخدم');
            } else {
                
                if ($payment->completePay(Complaint::where('id', $id)->first()->order_reference))
                    return redirect()->route('admin-show_Complaints')->with('status', 'تم الرد على المستخدم وتحويل المبلغ للصيدلية');
            }
            Complaint::where('id', $id)->update(array('replay' => ""));
        }
        return back()->with('error', ' لم يتم الرد على المستخدم  ');
    }

    public function editComplaints()
    {
        return view('admin.Complaints.edit_Complaints')->with($id);;
    }

    public function showCompliantOrders($id)
    {
        $request = OrderRequest::with(['details'])
            ->where('id', $id)->orderByDesc('updated_at')->first();

        $com = Complaint::where('order_reference', $id)->first();

        return view('admin.Complaints.compliant-orders', [
            'request' => $request,
            'com' => $com
        ]);
    }
}
