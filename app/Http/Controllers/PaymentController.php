<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function showPaymentForm()
    {
        return view('payment');
    }

    public function thanks()
    {
        return view('thanks');
    }

public function callback(Request $request)
{
    
    $status = $request->input('status');
    if ($status == 'paid') {
        
        session()->flash('StoreOrder', 'تم الدفع بنجاح!');
        return redirect('/Home');
    } else {
        
        return redirect('/CheckOut')->withErrors(['message' => 'فشل في الدفع']);
    }
}}