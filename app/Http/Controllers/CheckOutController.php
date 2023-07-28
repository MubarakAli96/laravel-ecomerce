<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    public function index()
    {

        $cartItems = Cart::where('user_id', auth()->id())->get();
        return view('pages.checkout', compact('cartItems'));
    }
    public function CheckStore(Request $request)
    {
        $data = array();
        $data['user_id'] = Auth::user()->id;
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['city'] = $request->city;
        $data['country'] = $request->country;
        $data['phone_no'] = $request->phone_no;
        $data['postal_code'] = $request->postal_code;
        $data['address'] = $request->address;
        $data['additional_info'] = $request->additional_info;
        $data['total'] = $request->total;

        if ($request->payment_option == 'stripe') {
            return view('pages.payment.stripe', compact('data'));
        } else if ($request->payment_option == 'cash') {
            return view('pages.payment.cash', compact('data', 'cart_total'));
        } else {
            return 'card page';
        }
    }
}
