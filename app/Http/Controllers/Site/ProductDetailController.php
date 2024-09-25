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
        $product = Product::with('subCategory.category','ProductSizes','ProductSizeColors')->where('slug', $slug)->where('status',1)->first();
        $products=Product::with('subCategory.category','ProductSizes','ProductSizeColors')->where('status',1)->inRandomOrder()->get();
        $realted_product=$products->where('sub_category_id','=',$product->sub_category_id)->where('id','!=',$product->id);
        if($realted_product->count() < 5)
        {
            $realted_product=Product::with('subCategory.category','ProductSizes','ProductSizeColors')->where('status',1)
            ->where('sub_category_id','=',$product->sub_category_id)
            ->orWhereHas('subCategory',function($query) use($product){
                $query->where('category_id','=',$product->subCategory->category_id);
            })
            ->where('id','!=',$product->id)->inRandomOrder()->limit(5)->get();
        }
        $feature_products=$products->where('feature',1)->where('id','!=',$product->id)->take(8);
        return view('site.products.product_details',compact(['product','feature_products','realted_product']));
    }
}
