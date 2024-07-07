<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        // Directly access the request data
        $productId = $request->input('productId');
        $quantity = $request->input('quantity', 1);


        $userId = Auth::id();

        // Additional checks can be added here, such as if the product exists in your database

        // Assuming your Cart model or database setup allows for quantities
        $cartItem = Cart::where('user_id', $userId)->where('product_id', $productId)->first();

        if ($cartItem) {
            // If the item already exists, update the quantity
            $cartItem->qte += is_numeric($quantity) && $quantity > 0 ? $quantity : 1;
            $cartItem->save();
            return response()->json([
                'message' => 'Quantity updated successfully!',
                'cartItem' => $cartItem,
                'action' => 'updated', // Add this line
            ]);


        } else {
            // If not, create a new cart item
            $cartItem = Cart::create([
                'product_id' => $productId,
                'user_id' => $userId,
                'qte' => (int)$quantity,
            ]);

            return response()->json([
                'message' => 'Product added to cart successfully!',
                'cartItem' => $cartItem,
                'action' => 'added', // Add this line
            ]);

        }

    }


    public function count()
    {
        $userId = Auth::id();
        $count = Cart::where('user_id', $userId)->count(); // Count the number of cart entries for the user

        return response()->json(['count' => $count]);
    }

    public function getCartContents()
    {
        $userId = auth()->id(); // Or however you get the current user's ID

        $cartItems = Cart::with('product') // Eager load product details
        ->where('user_id', $userId)
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'product_id' => $item->product_id,
                    'product_name' => $item->product->title, // Using 'title' from your products table
                    'product_price' => $item->product->price,
                    'product_image' => $item->product->image,
                    'qte' => $item->qte,
                ];
            });

        return response()->json($cartItems);
    }

    public function updateQuantity(Request $request)
    {
        $itemId = $request->itemId;
        $increase = $request->increase; // true for increase, false for decrease

        // Find the cart item by ID
        $cartItem = Cart::find($itemId);

        if (!$cartItem) {
            return response()->json(['message' => 'Item not found'], 404);
        }

        // Update quantity
        if ($increase) {
            $cartItem->qte += 1;
        } else {
            // Prevent quantity from going below 1
            $cartItem->qte = max(1, $cartItem->qte - 1);
        }

        $cartItem->save();

        return response()->json(['message' => 'Quantity updated successfully']);
    }


    public function removeFromCart(Request $request)
    {
        $itemId = $request->input('itemId');
        $result = Cart::where('id', $itemId)->delete(); // Adjust based on your cart item identification logic

        if ($result) {
            return response()->json(['success' => true, 'message' => 'Item removed from cart.']);
        } else {
            return response()->json(['success' => false, 'message' => 'Failed to remove item.'], 500);
        }
    }

    public function clearCart(Request $request)
    {
        // Ensure the user is authenticated
        if (!Auth::check()) {
            return response()->json(['message' => 'User not authenticated.'], 403);
        }

        // Get the authenticated user's ID
        $userId = Auth::id();

        // Remove all cart items for this user
        Cart::where('user_id', $userId)->delete();

        return response()->json(['message' => 'Cart cleared successfully.'], 200);
    }


    function CheckOut()
    {

        return view('CheckOut');
    }

    public function getItems()
    {
        $userId = auth()->id(); // Adjust this according to how you manage users
        $cartItems = Cart::where('user_id', $userId)->with('product')->get();

        return response()->json($cartItems);
    }


}
