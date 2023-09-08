<?php

namespace App\Http\Controllers;

use Rules\Password;
use App\Models\User;
use App\Rules\ReCaptcha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Notifications\VendorRegisteration;
use Illuminate\Support\Facades\Notification;

class BecomeVendorController extends Controller
{
    public function index()
    {
        return view('pages.become_vendor');
    }
    public function StoreVEndor(Request $request)
    {
        $request->validate([

            'g-recaptcha-response' => ['required', new ReCaptcha]
        ]);

        $vendorReg = User::where('role', 'admin')->get();

        $user = User::create([
            // 'profile_image' => $fileNamePath,
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'status' => 0,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'phone_no' => $request->phone_no,
            'facebook_link' => $request->facebook_link,
            'insta_link' => $request->insta_link,
            'twiter_link' => $request->twiter_link,

        ]);
        Notification::send($vendorReg, new VendorRegisteration($request));
        return redirect()->back()->with('success', 'Refistered Successfuuly');
    }
}
