<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChecOut;
use App\Models\Cart;

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
    public function failed()
    {
        return view('failed');
    }

    public function callback($order_id, Request $request)
    {
        
        $status = $request->input('status');
        if ($status == 'paid') {
            $checkout = ChecOut::find($order_id);
            $checkout->status = 'paid';
            $checkout->save();

            // Delete cart items
            Cart::where('user_id', auth()->id())->delete();

            // Commit the transaction
            \DB::commit();
            session()->flash('StoreOrder', 'تم الدفع بنجاح!');
            return redirect('/thanks');
        } else {

            return redirect('/failed')->withErrors(['message' => 'فشل في الدفع']);
        }
    }
}
