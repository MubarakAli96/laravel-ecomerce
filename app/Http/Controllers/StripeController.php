<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StripeController extends Controller
{
    public function stripe_payment(Request $request)
    {
        \Stripe\Stripe::setApiKey('sk_test_51NY2yrAkTnykbfUCGKHm3QPMQlh8YusoO5B8K3IsN9IgA2I7ozzRzpWr2Tkb6E1ytNedfcd9VKd7kiGJi7hpiLYz00dPvhx4Hy');

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
            'amount' => $request->amount * 100,
            'currency' => 'usd',
            'description' => 'Ecommerce Payment',
            'source' => $token,
            'metadata' => ['order_id' => uniqid()],
        ]);
        $order_id = Order::insertGetId([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
            'address' => $request->address,
            'country' => $request->country,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'additional_info' => $request->additional_info,

            'payment_type' => $charge->payment_method,
            'transaction_id' => $charge->balance_transaction,
            'payment_method' => 'stripe',
            'amount' => $request->amount,
            'currency' => $charge->currency,
            'order_number' => $charge->metadata->order_id,


            'invoice_no' => 'ECS' . mt_rand(10000000, 99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),

            'status' => 'pending',

        ]);
        $carts = Cart::where('user_id', auth()->id())->get();
        foreach ($carts as $cart) {
            OrderItem::insert([
                'order_id' => $order_id,
                'product_id' => $cart->id,
                'vendor_id' => $cart->vendor_id,
                'color' => $cart->color,
                'size' => $cart->size,
                'quantity' => $cart->quantity
            ]);
        }

        $carts->delete();
        $carts->refresh();

        return redirect()->rout('/carts');
    }
}
