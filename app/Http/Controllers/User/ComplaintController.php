<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Notify\NotificationsController;
use Illuminate\Http\Request;
use App\Models\Complaint;
use App\Models\Pharmacy;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ComplaintController extends Controller
{
    //
    public function index()
    {
    $client = User::with('client')->where('id', Auth::id())->firstOrFail();

    $complaint = Complaint::with(['pharmacy.user'])
    ->where('client_id', Auth::id())->orderByDesc('id')->get();

    $pharmacies = Pharmacy::with('user')->get();
    return view('user.problems', [
        'pharmacies' => $pharmacies,
        'compliants' => $complaint,
        'user' => $client
    ]);

    }



    public function store(Request $request)
    {
    $request->validate(
        ['message' => 'required'],
    [
        'message.required' => "يجب إدخال نص الشكوى"
    ]);
    $complaint = new Complaint();

    $complaint->client_id = Auth::id();
    $complaint->pharmacy_id = $request->pharmacy_id;
    $complaint->message = $request->message;
    $complaint->save();
    if (!$complaint->save())
        return back()->with('error', 'لم يتم إضافة هذه الشكوى');
    else{

        $Notify = new NotificationsController();
        // $user = User::find($complaint->client_id);
        // $phar = User::find($complaint->pharmacy_id);
        // $data =[

        //     'client_name'=>  $user->name,
        //     'pharmacy_name'=> $phar->name,
        //     // 'message'=> $complaint->message,

        // ];



        $Notify -> ComplaintsNotification($complaint);

        return back()->with('status', 'تم إضافة شكوى جديدة بنجاح');
    }




    }

    public function delete($id)
    {
    $res = Complaint::where('id', $id)
        ->update(['is_active' => 0]);
    if (!$res) return back()->with('error', 'لم يتم حذف هذه الشكوى');
    return back()->with('status', 'تم حذف الشكوى بنجاح');
    }
}
