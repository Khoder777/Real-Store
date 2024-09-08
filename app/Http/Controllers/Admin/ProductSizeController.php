<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProductSize;
use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductSizeController extends Controller
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
        $size=Size::get();
        return view('admin.productSize.create',compact('size','id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $vali=$request->validate([
            'size_id'=>'required',
            'product_id'=>'required',
        ]);
        ProductSize::create([
            'size_id'=>$request->size_id,
            'product_id'=>$request->product_id,
        ]);
        return redirect()->route('admin.product.show',$request->product_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductSize $productSize)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductSize $productSize)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductSize $productSize)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductSize $productSize)
    {
        //
    }
}
