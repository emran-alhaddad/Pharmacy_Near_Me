<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
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
    $UserId = Auth::id();

    $complaint = Complaint::with(['pharmacy.user'])
      ->where('client_id', Auth::id())->orderByDesc('id')->get();

    $client = User::with('client')->where('id', Auth::id())->firstOrFail();

    // return $complaint;
    return view('user.compliant.index', [
      'compliants' => $complaint,
      'user' => $client
    ]);
  }

  public function create()
  {
    $client = User::with('client')->where('id', Auth::id())->firstOrFail();
    $pharmacies = Pharmacy::with('user')->get();
    return view('user.compliant.add', [
      'pharmacies' => $pharmacies,
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
    return back()->with('status', 'تم إضافة شكوى جديدة بنجاح');
  }

  public function delete($id)
  {
    $res = Complaint::where('id', $id)
      ->update(['is_active' => 0]);
    if (!$res) return back()->with('error', 'لم يتم حذف هذه الشكوى');
    return back()->with('status', 'تم حذف الشكوى بنجاح');
  }
}
