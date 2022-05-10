<?php

namespace App\Http\Controllers\Pharmacy;

use App\Http\Controllers\Controller;
use App\Models\Pharmacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PharmacyController extends Controller
{
    public function index()
    {
        return view('pharmacy.index', [
            'pharmacy' => Pharmacy::with(['user', 'zone.city'])->where('user_id', Auth::user()->id)->first()
        ]);
    }
    // pharmacy views
    public function account()
    {
        return view('pharmacy.account.pharmacyAccunt');
    }
    public function settings()
    {
        return view('pharmacy.account.pharmacySettings');
    }
    public function orders()
    {
        return view('pharmacy.orders.manageOrders');
    }
    public function detailes()
    {
        return view('pharmacy.orders.orderDetailes');
    }
}
