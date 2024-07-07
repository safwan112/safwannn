<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\ChecOut;
use App\Models\Product;
use Illuminate\Http\Request;

class ChecOutController extends Controller
{
    function StoreOrder(Request $request)
    {

        // Validate the request data
        $validated = $request->validate([
            'country' => 'required',
            'firstname' => 'required',
            'secoundname' => 'required',
            'adress' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'idproducts' => 'required',
            'total' => 'required',
            // Include other fields as necessary
        ]);


        // Assuming idproducts is a comma-separated string of product IDs like "3,17,16,18,19,23,10,13,11"
        $idProducts = explode(',', $validated['idproducts']);
        // Loop through the product IDs and increment the sales column for each
        foreach ($idProducts as $productId) {
            // Ensure $productId is a valid number (sanitization)
            $productId = (int)$productId;

            $sales = Product::find($productId);
            $sales->sales += 1;
            $sales->save();

        }

        // Store in database
        // Assuming you have all necessary data validated in $validated
        $checkout = new ChecOut(); // Create a new ChecOut instance

        // Set properties
        $checkout->user_id = auth()->id();
        $checkout->product_id = $validated['idproducts'];
        $checkout->price = $validated['total'];
        $checkout->country = $validated['country'];
        $checkout->firstname = $validated['firstname'];
        $checkout->secoundname = $validated['secoundname'];
        $checkout->adress = $validated['adress'];
        $checkout->city = $validated['city'];
        $checkout->phone = $validated['phone'];
        $checkout->save = $request->save;
        $checkout->quantity = $request->quantity;
        $checkout->status = 'pending';

        // Save the checkout record to the database
        $checkout->save();

        Cart::where('user_id', auth()->id())->delete();

        session()->flash('StoreOrder', 'لقد تم ارسال طلبك بنجاح سنتواصل معك في اقرب وقت !');
        // Redirect or return a response
        return view('payment')->with(['checkout' => $checkout->getRawOriginal()]);

    }

}

