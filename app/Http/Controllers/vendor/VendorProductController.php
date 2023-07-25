<?php

namespace App\Http\Controllers\vendor;

use App\Models\User;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\MultiImage;
use Illuminate\Support\Str;
use App\Models\Sub_Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VendorProductController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $products = Product::where('vendor_id', $id)->get();
        return view('vendor.product.index', compact('products'));
    }
    public function addvendorProduct()
    {

        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        // $subcategories = Sub_Category::latest()->get();

        return view('vendor.product.add', compact('brands', 'categories'));
    }
    public function storeVenProduct(Request $request)
    {
        $rules = Validator::make($request->all(), [
            'name' => 'required',
            'selling_price' => 'required',
            'description' => 'required',
            'product_thumbnail' => 'required',
        ]);
        if ($rules->fails()) {
            return back()->withErrors($rules);
        }
        if ($request->hasFile('product_thumbnail')) {
            $img = $request->product_thumbnail;
            $num = rand(1, 999);
            $number = $num / 7;
            $extension = $img->extension();
            $fileNewName = Date('Y-M-D') . " - " . $number . "-" . $extension;
            $filenamepath = 'productsthumbimage/' . $fileNewName;
            $filepath = $img->move(public_path('productsthumbimage/'), $filenamepath);
        }

        $product_id = Product::insertGetId([
            'product_thumbnail'  => $filenamepath,
            'brand_id'           => $request->brand_id,
            'category_id'        => $request->category_id,
            'sub_category_id'    => $request->sub_category_id,
            'name'               => $request->name,
            'slug'               => Str::slug($request->name, '-'),

            'product_code'       => $request->product_code,
            'product_qty'        => $request->product_qty,
            'product_tags'       => $request->product_tags,
            'product_size'       => $request->product_size,
            'product_color'      => $request->product_color,
            'selling_price'      => $request->selling_price,
            'discount_price'     => $request->discount_price,

            'description'        => $request->description,
            'short_decription'   => $request->short_decription,
            'hot_deals'          => isset($request->hot_deals) ? 0 : 1,

            'features'           => isset($request->features) ? 0 : 1,
            'special_offers'     => isset($request->special_offers) ? 0 : 1,
            'special_deals'      => isset($request->special_deals) ? 0 : 1,

            'status'             => isset($request->status) ? 1 : 0,
            'vendor_id'          => Auth::user()->id,

        ]);

        // multi imgae upload here

        if ($request->hasFile('multi_image')) {
            foreach ($request->multi_image as $key => $img) {
                $img = $img;
                $number = rand(1, 999);
                $numb = $number / 7;
                $extension = $img->extension();
                $filenamenew = date('Y-m-d') . "_." . $numb . "_." . $extension;
                $filenamepath = 'upload/product_multi_imag/' . '/'  . $filenamenew;
                $filename = $img->move(public_path('upload/product_multi_imag/'), $filenamenew);

                MultiImage::insert([
                    'product_id' => $product_id,
                    'multi_image' => $filenamepath,
                ]);
            }
        }

        return redirect()->route('vendor_product.all');
    }

    public function vendorajax($category_id)
    {
        $sub = Sub_Category::where('category_id', $category_id)->get();
        return json_encode($sub);
    }
}
