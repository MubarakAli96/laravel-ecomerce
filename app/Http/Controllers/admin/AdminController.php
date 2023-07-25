<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Banner;
use App\Models\Slider;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()

    {
        $products = Product::all();
        $users = User::all();
        return view('admin.index', compact('users', 'products'));
    }
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function frontPageSilder()
    {
        $sliders = slider::latest()->get();
        return view('admin.frontPageSilder.index', compact('sliders'));
    }
    public function createPageSlider()
    {
        return view('admin.frontPageSilder.create');
    }
    public function storeSilder(Request $request)
    {
        // dd($request->all());
        $rule = Validator::make($request->all(), [
            'heading' => 'required',
        ]);
        if ($rule->fails()) {
            return back()->withErrors($rule);
        }
        if ($request->hasFile('silder_banner')) {
            $image = $request->silder_banner;
            $num = rand(1, 999);
            $number = $num / 7;
            $extension = $image->extension();
            $fileNewName = date('Y-M-D') . "-" . $number . "-" . $extension;
            $fileNewPath = 'upload/silderbanner/' . '/' . $fileNewName;
            $storePath = $image->move(public_path('upload/silderbanner/' . '/'), $fileNewName);
        }
        Slider::create([
            'silder_banner' => $fileNewPath,
            'heading' => $request->heading,
            'paragraph' => $request->paragraph,
            'status' => isset($request->status) ? 1 : 0,


        ]);
        return redirect()->route('all.slider');
    }

    //banner 
    public function frontPageBanner()
    {
        $banners = Banner::latest()->get();
        return view('admin.frontPageBanner.index', compact('banners'));
    }
    public function createPageBanner()
    {
        return view('admin.frontPageBanner.create');
    }
    public function storeBanner(Request $request)
    {
        // dd($request->all());
        $rule = Validator::make($request->all(), [
            'heading' => 'required',
        ]);
        if ($rule->fails()) {
            return back()->withErrors($rule);
        }
        if ($request->hasFile('banner_image')) {
            $image = $request->banner_image;
            $num = rand(1, 999);
            $number = $num / 7;
            $extension = $image->extension();
            $fileNewName = date('Y-M-D') . "-" . $number . "-" . $extension;
            $fileNewPath = 'upload/bannerImage/' . '/' . $fileNewName;
            $storePath = $image->move(public_path('upload/bannerImage/' . '/'), $fileNewName);
        }
        Banner::create([
            'banner_image' => $fileNewPath,
            'heading' => $request->heading,
            'paragraph' => $request->paragraph,
            'status' => isset($request->status) ? 1 : 0,


        ]);
        return redirect()->route('all.banner');
    }
    /////////////////////////////////////////// manage admins////////////////////////////////////////////////////

    public function alladmin()
    {
        $alladminUsers = User::where('role', 'admin')->latest()->get();
        return view('admin.all_admin.index', compact('alladminUsers'));
    }
    public function addAdmin()
    {
        $roles = Role::all();
        return view('admin.all_admin.create', compact('roles'));
    }
    public function storeAdmins(Request $request)
    {
        $user = new User();
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = 'admin';
        $user->password = Hash::make($request->password);
        $user->save();

        if ($request->roles) {
            $user->assignRole($request->roles);
        }
    }
    public function contactsDisplay()
    {
        $contacts = Contact::all();
        return view('admin.contactall', compact('contacts'));
    }
    //////////////////// profile of users//////////////////////////////////////////////

    public function UserProfile()
    {
        $id = Auth::user()->id;
        $users = User::find($id);
        return view('admin.user_profile.index', compact('users'));
    }
    public function StorePofile(Request $request)
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
            $fileNamePath = 'upload/profile_image/' . $fileNewName;
            $filepath = $img->move(public_path('upload/profile_image/'), $fileNamePath);
            $data['profile_image'] =  $fileNamePath;
        }
        $data->save();
        return redirect()->back();
    }

    public function changePassword()
    {
        $id = Auth::user()->id;
        $users = User::find($id);
        return view('admin.user_profile.changepass', compact('users'));
    }

    public function UpdateAdminPass(Request $request)
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
}
