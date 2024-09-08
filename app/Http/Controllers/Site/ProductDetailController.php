<?php

namespace App\Http\Controllers\Site;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;

class ProductDetailController extends Controller
{
    public function index($slug)
    {
        $product = Product::where('slug', $slug)->where('status',1)->first();
        $realted_product=Product::where('sub_category_id','=',$product->sub_category_id)->where('id','!=',$product->id)->get();
        $feature_products=Product::where('feature',1)->get();
        return view('site.products.product_details',compact(['product','feature_products','realted_product']));
    }
}
