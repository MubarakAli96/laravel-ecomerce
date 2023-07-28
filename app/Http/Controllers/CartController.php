<?php

namespace App\Http\Controllers;

use App\Models\Cart;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {

        return view('pages.cart');
    }

    public function addToCart(Request $request)
    {
        $productId = $request->input('products_id');
        $quantity = $request->input('quantity');
        $color = $request->input('color');
        $size = $request->input('size');
        $vendor_id = $request->input('vendor_id');


        // Find the product
        $product = Product::findOrFail($productId);

        // Check if the product already exists in the cart for the logged-in user
        $existingCartItem = Cart::where('user_id', auth()->id())
            ->where('products_id', $productId)
            ->first();

        if ($existingCartItem) {
            // If the product already exists, update the quantity
            $existingCartItem->quantity += $quantity;
            $existingCartItem->save();
        } else {
            // If the product doesn't exist, create a new cart item
            $cart = Cart::create([
                'user_id' => auth()->id(),
                'products_id' => $productId,
                'price' => $quantity,
                'quantity' => $quantity,
                'size' => $size,
                'color' => $color,
                'vendor_id' => $vendor_id,
            ]);
            // dd($cart);
        }

        return redirect()->route('cart.show')->with('success', 'Product added to cart successfully!');
    }
    public function showCart()
    {
        $cartItems = Cart::where('user_id', auth()->id())->get();
        return view('pages.cart', compact('cartItems'));
    }
}
