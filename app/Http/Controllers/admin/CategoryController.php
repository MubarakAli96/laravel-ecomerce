<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return view('admin.category.index', compact('categories'));
    }
    public function create()
    {
        return view('admin.category.add');
    }
    public function store(Request $request)
    {
        $rules = Validator::make($request->all(), [
            'name'  => 'required',
        ]);
        if ($rules->fails()) {
            return back()->withErrors($rules);
        };

        if ($request->hasFile('image')) {
            $img = $request->image;
            $num = rand(1, 999);
            $number = $num / 7;
            $extension = $img->extension();
            $fileNewName = Date('Y-M-D') . " - " . $number . "-" . $extension;
            $filenamepath = 'categoryImage/' . $fileNewName;
            $filepath = $img->move(public_path('categoryImage/'), $filenamepath);
        }
        $responsse = Category::create([
            'image' => $filenamepath,
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
            'status' => isset($request->status) ? 1 : 0
        ]);
        $responsse->save();
        return redirect()->route('category');
    }
}
