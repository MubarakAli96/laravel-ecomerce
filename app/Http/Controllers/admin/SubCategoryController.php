<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\Sub_Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subCategorys = Sub_Category::all();
        return view('admin.subcategory.index', compact('subCategorys'));
    }
    public function create()
    {
        $categories = Category::OrderBy('name', 'ASC')->get();
        return view('admin.subcategory.add', compact('categories'));
    }
    public function store(Request $request)
    {
        $rules = Validator::make($request->all(), [
            'name' => 'required',

        ]);
        if ($rules->fails()) {
            return back()->withErrors($rules);
        }

        $response = Sub_Category::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'status'   => isset($request->status) ? 1 : 0,
            'slug'     => Str::slug($request->name, '_'),

        ]);
        if ($response) {
            return redirect()->route('sub_catgory')->with('success', ' the sub_catgory add successfully❤');
        } else {
            return redirect()->route('sub_catgory')->with('error', ' Sorry there is some error🤦‍♂️🤦‍♂️');
        }
    }
    public function ajaxSub($category_id)
    {
        $sub = Sub_Category::where('category_id', $category_id)->get();
        return json_encode($sub);
    }
}
