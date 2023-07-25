<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\AdminApprove;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;

class ActiveUserController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'user')->latest()->get();
        return view('admin.user_managment.index', compact('users'));
    }
    public function all_active_vendors()
    {

        $vendors = User::where('role', 'vendor')->latest()->get();
        return view('admin.user_managment.vendorall', compact('vendors'));
    }
    public function userStatus($id, $status, Request $request)
    {
        // dd($id, $status);
        $data = User::find($id);
        $data->status = $status;
        $data->save();
        // dd($data->status);
        $adminappr = User::where('role', 'vendor')->get();
        Notification::send($adminappr, new AdminApprove($request));
        return response()->json(['data' => 'Status has been changed...']);
        // return view('dashboard.admin.partnerServices.index', compact('data'));
    }
    public function detailVendor($id)
    {
        $vendor = User::find($id);
        // dd($vendor->toArray());
        return view('admin.user_managment.vendordetail', compact('vendor'));
    }
}
