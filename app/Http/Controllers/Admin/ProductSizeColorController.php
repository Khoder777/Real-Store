<?php

namespace App\Http\Controllers\Admin;

use App\Jobs\NewProductEmail;
use App\Models\ProductSizeColor;
use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductSize;
use Illuminate\Http\Request;

class ProductSizeColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $color=Color::get();
        $product=Product::find($id);
        return view('admin.productSizeColor.create',compact('color','product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $vali=$request->validate([
            'color_id'=>'required',
            'product_id'=>'required',
            'productsize_id'=>'required',
            'price'=>'required',
            'offer'=>'nullable',
            'quantity'=>'required|int'
        ]);
     
        ProductSizeColor::create([
            'color_id'=>$request->color_id,
            'product_id'=>$request->product_id,
            'productsize_id'=>$request->productsize_id,
            'price'=>$request->price,
            'offer'=>$request->offer,
            'quantity'=>$request->quantity,
        ]);
        
        return redirect()->route('admin.product.show',$request->product_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductSizeColor $productSizeColor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductSizeColor $productSizeColor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductSizeColor $productSizeColor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductSizeColor $productSizeColor)
    {
        //
    }
}
