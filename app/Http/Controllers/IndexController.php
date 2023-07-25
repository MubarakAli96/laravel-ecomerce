<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\MultiImage;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Sub_Category;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $skip_category_0 = Category::skip(0)->first();
        $skip_product_0 = Product::where('status', 1)->where('category_id', $skip_category_0->id)->limit(5)->get();

        $skip_category_2 = Category::skip(2)->first();
        $skip_product_2 = Product::where('status', 1)->where('category_id', $skip_category_2->id)->limit(5)->get();

        $skip_category_3 = Category::skip(3)->first();
        $skip_product_3 = Product::where('status', 1)->where('category_id', $skip_category_3->id)->limit(5)->get();

        $hot_deal = Product::where('hot_deals', 1)->limit(3)->get();
        $special_offer = Product::where('special_offers', 1)->limit(3)->get();
        $special_deals = Product::where('special_deals', 1)->orderBy('name', 'ASC')->limit(3)->get();
        $recently_added = Product::where('status', 1)->orderBy('id', 'DESC')->limit(3)->get();

        $categoriesFeature = Category::orderBy('name', 'ASC')->limit(9)->get();
        $sliders = Slider::where('status', 1)->get();
        $featurePro = Product::where('features', 1)->limit(6)->get();
        $banners = Banner::where('status', 1)->get();
        return view('pages.index', compact(
            'sliders',
            'categoriesFeature',
            'banners',
            'featurePro',
            'skip_product_0',
            'skip_category_0',
            'skip_product_2',
            'skip_category_2',
            'skip_product_3',
            'skip_category_3',
            'hot_deal',
            'special_offer',
            'special_deals',
            'recently_added'
        ));
    }
    public function product_details($id, $slug)
    {
        $products = Product::findOrFail($id);
        //color
        $color = $products->product_color;
        // remove commas
        $product_color = explode(',', $color);
        //size
        $size = $products->product_size;
        // remove commas
        $product_size = explode(',', $size);
        //for related product
        $cate_id = $products->category_id;
        $relatedProducts = Product::where('category_id', $cate_id)->where('id', '!=', $id)
            ->orderBy('id', 'DESC')->limit(4)->get();

        $multiImages = MultiImage::where('product_id', $id)->get();
        return view('pages.productDetail', compact('products', 'product_color', 'product_size', 'multiImages', 'relatedProducts'));
    }
    public function catewsise_product(Request $request, $id, $slug)
    {
        $products = Product::where('status', 1)->where('category_id', $id)->get();
        $categories = Category::orderBy('name', 'ASC')->get();
        $breadcat = Category::where('id', $id)->first();
        return view('pages.catgeoryDetails', compact('products', 'categories', 'breadcat'));
    }
    public function subcate_wise_product(Request $request, $id, $slug)
    {
        $products =  Product::where('status', 1)->where('sub_category_id', $id)->get();
        $sub_categories = Sub_Category::orderBy('name', 'ASC')->get();
        $categories = Category::where('status', 1)->get();
        $breadcat = Sub_Category::where('id', $id)->first();
        return view('pages.sub_categorydetails', compact('products', 'sub_categories', 'categories', 'breadcat'));
    }

    public function productsearch(Request $request)
    {
        $request->validate(['search' => 'required']);
        $item = $request->search;
        $products = Product::where('name', 'LIKE', "%$item%")->get();
        return view('pages.prodcut_search', compact('products', 'item'));
    }
}
