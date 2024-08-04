<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\ChecOut;
use App\Models\Product;
use Illuminate\Http\Request;

class ChecOutController extends Controller
{
    public function StoreOrder(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'country' => 'required',
            'firstname' => 'required',
            'secoundname' => 'required',
            'adress' => 'required',
            'city' => 'required',
            'discountcode' => '',
            'phone' => 'required',
            'idproducts' => 'required',
            'total' => 'required',
            // Include other fields as necessary
        ]);

        // Assuming idproducts is a comma-separated string of product IDs like "3,17,16,18,19,23,10,13,11"
        $idProducts = explode(',', $validated['idproducts']);

        try {
            // Begin a transaction to ensure all or nothing logic
            \DB::beginTransaction();

            // Loop through the product IDs and increment the sales column for each
            foreach ($idProducts as $productId) {
                // Ensure $productId is a valid number (sanitization)
                $productId = (int)$productId;

                $product = Product::find($productId);
                if ($product) {
                    $product->sales += 1;
                    $product->save();
                }
            }

            // Store in database
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
            $checkout->discountcode = $validated['discountcode'];
            $checkout->phone = $validated['phone'];
            $checkout->quantity = $request->quantity;
            $checkout->status = 'pending'; // Set initial status as pending

            // Save the checkout record to the database
           
                $checkout->save();

                // Delete cart items
                Cart::where('user_id', auth()->id())->delete();

                // Commit the transaction
                \DB::commit();

            // Redirect to payment view with success message
            return view('payment')->with(['checkout' => $checkout]);

        } catch (\Exception $e) {
            // Rollback the transaction if an error occurred
            \DB::rollback();

            // Optionally handle the exception, log it, or notify the user
            return back()->withInput()->withErrors(['error' => 'Failed to process order. Please try again later.']);
        }
    }

    public function paymentCallback(Request $request)
    {
        $checkout = ChecOut::find($request->order_id);
     
        try {
            // Begin a transaction to ensure all or nothing logic
            \DB::beginTransaction();

            if ($request->status == 'paid') {
                // Update status to 'paid'
                $checkout->status = 'paid';
                $checkout->save();

                // Delete cart items
                Cart::where('user_id', auth()->id())->delete();

                // Commit the transaction
                \DB::commit();

                // Redirect to thanks view with success message
                return redirect()->route('thanks');
            } else {
                
                return redirect()->route('failed');
            }
        } catch (\Exception $e) {
            // Rollback the transaction if an error occurred
            \DB::rollback();

            // Optionally handle the exception, log it, or notify the user
            return back()->withInput()->withErrors(['error' => 'Failed to process payment. Please try again later.']);
        }
    }
}
