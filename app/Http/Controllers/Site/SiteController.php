<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\brand;
use App\Models\category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Support\Facades\Cache;

class SiteController extends Controller
{
    public function index()
    {
        // Cache::forget('products');
        if(Cache::get('products')){
            $products = Cache::get('products');
        }else{
            $products=Product::with('subCategory.category','ProductSizeColors')->where('status',1)->inRandomOrder()->limit(8)->get();
            Cache::put('products',$products);
        }
        // $products=Product::with('subCategory.category','ProductSizeColors')->where('status',1)->inRandomOrder()->limit(8)->get();
        $new_products=Product::with('subCategory.category','ProductSizeColors')->where('status',1)->where('created_at','>=',now()->subDays(7))->inRandomOrder()->limit(8)->get();
        $categories=category::inRandomOrder()->limit(4)->get();
        $brands=brand::inRandomOrder()->limit(4)->get();
        $main_slider=Slider::where('status',1)->where('type','main')->get();
        $end_slider=Slider::where('status',1)->where('type','end')->inRandomOrder()->first();
        return view('site.index',compact(['main_slider','categories','products','new_products','brands','end_slider']));
    }

    public function signin()
    {
        return view('site.auth.sign-in');
    }
    public function signup()
    {
        return view('site.auth.sign-up');
    }
}
