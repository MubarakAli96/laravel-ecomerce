<?php

namespace App\Http\Controllers\vendor;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class VendorController extends Controller
{
    public function vindex()
    {
        $id = Auth::user()->id;
        $products = Product::where('vendor_id', $id)->get();

        return view('vendor.vendorindex', compact('products',));
    }
    // public function destroyvendor(Request $request): RedirectResponse
    // {
    //     Auth::guard('web')->logout();

    //     $request->session()->invalidate();

    //     $request->session()->regenerateToken();

    //     return redirect('/');
    // }
    public function vend_logout(Request $request)
    {
        Auth::logout();

        // You can also clear the user's session data if needed
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'You have been logged out successfully.');
    }
    //////////////////////////////// Profile Settings//////////////////////////////////////////////////

    public function vendorProfile()
    {
        $id = Auth::user()->id;
        $users = User::find($id);

        return view('vendor.user_profile.index', compact('users'));
    }
    public function vendorStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;
        $data->phone_no = $request->phone_no;
        $data->address = $request->address;
        $data->facebook_link = $request->facebook_link;
        $data->insta_link = $request->insta_link;
        $data->twiter_link = $request->twiter_link;

        if ($request->hasFile('profile_image')) {
            $img = $request->profile_image;
            $num = rand(1, 999);
            $number = $num / 7;
            $extension = $img->extension();
            $fileNewName = date('Y-M-D') . "_" . $number . "_" . $extension;
            $fileNamePath = 'upload/vendor/profile_image/' . $fileNewName;
            $filepath = $img->move(public_path('upload/vendor/profile_image/'), $fileNamePath);
            $data['profile_image'] =  $fileNamePath;
        }
        $data->save();
        return redirect()->back();
    }

    public function vendorchangePassword()
    {
        $id = Auth::user()->id;
        $users = User::find($id);
        return view('vendor.user_profile.changepass', compact('users'));
    }

    public function UpdatVendorPass(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);
        // check old password match
        if (!Hash::check($request->old_password, auth::user()->password)) {
            return back()->with("error", "Old Password Doesn't matahed");
        }
        //update new password

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        return back()->with("status", "Password Changed Successfully");
    }

    //vendor orders

    public function vendor_orders()
    {
        $id = Auth::user()->id;
        $orders = OrderItem::with('order')->where('vendor_id', $id)->orderBy('id', 'DESC')->get();
        return view('vendor.vendor_orders.index', compact('orders'));
    }
}
