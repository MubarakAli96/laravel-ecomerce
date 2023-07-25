<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Validator;
use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::where('status', 1)->get();
        return view('admin.brand.index', compact('brands'));
    }
    public function create()
    {
        return view('admin.brand.add');
    }
    public function store(Request $request)
    {
        $rules = Validator::make($request->all(), [
            'name' => 'required',

        ]);
        if ($rules->fails()) {
            return back()->withErrors($rules);
        }
        if ($request->hasFile('image')) {
            $img = $request->image;
            $num = rand(1, 999);
            $number = $num / 7;
            $extension = $img->extension();
            $fileNewName = date('Y-M-D') . "_" . $number . "_" . $extension;
            $fileNamePath = 'brandImage/' . $fileNewName;
            $filepath = $img->move(public_path('brandImage/'), $fileNamePath);
        }
        $response = Brand::create([
            'image' => $fileNamePath,
            'name' => $request->name,
            'status'   => isset($request->status) ? 1 : 0,
            'slug'     => Str::slug($request->name, '_'),

        ]);
        if ($response) {
            return redirect()->route('brand')->with('success', ' the brand add successfully❤');
        } else {
            return redirect()->route('brand')->with('error', ' Sorry there is some error🤦‍♂️🤦‍♂️');
        }
    }
}
