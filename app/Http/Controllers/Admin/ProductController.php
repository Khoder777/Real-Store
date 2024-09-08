<?php

namespace App\Http\Controllers\Admin;

use App\Models\brand;
use App\Models\Product;
use App\Models\subCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Jobs\NewProductEmail;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::all();
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sub_category=subCategory::get();
        $brand=brand::get();
        return view('admin.products.create',compact(['sub_category','brand']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $vali=$request->validate([
            'name'=>'required|string|max:255|unique:products,name',
            'image'=>'required|mimes:png,jpg|max:8000',
            'sub_category_id'=>'required|not_in:0',
            'brand_id'=>'required|not_in:0',
            'status'=>'nullable',
            'feature'=>'nullable',
            'description'=>'required|string',
            's_description'=>'required|string',
        ]);
  
        if($request->hasFile('image')){
          
            $filename=$request->image;
     
            $name=time().'.'.str_replace(' ','',$filename->getClientOriginalName());
          
            $filename->storeAs('public/product',$name);

        }
        Product::create([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'image'=>$name,
            'sub_category_id'=>$request->sub_category_id,
            'brand_id'=>$request->brand_id,
            'status'=>$request->status ? true : false,
            'feature'=>$request->feature ? true : false,
            'description'=>$request->description,
            's_description'=>$request->s_description,
        ]);
        return redirect()->route('admin.product.index')->with('success','تم اضافة منتج بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product=Product::find($id);
        $productColorSize=$product->productSizeColors()->with('color','productSize')->get();
        return view('admin.products.show',compact(['product','productColorSize']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sub_category=subCategory::get();
        $brand=brand::get();
        $product=Product::find($id);
        return view('admin.products.edit',compact(['product','sub_category','brand']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $vali=$request->validate([
            'name'=>'required|string|max:255|unique:products,name,'.$id.'',
            'image'=>'nullable|mimes:png,jpg|max:8000',
            'sub_category_id'=>'required|not_in:0',
            'brand_id'=>'required|not_in:0',
            'status'=>'nullable',
            'feature'=>'nullable',
            'description'=>'required|string',
            's_description'=>'required|string',
        ]);

        $p=Product::find($id);
        $p->update([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'sub_category_id'=>$request->sub_category_id,
            'brand_id'=>$request->brand_id,
            'status'=>$request->status ? true : false,
            'feature'=>$request->feature ? true : false,
            'description'=>$request->description,
            's_description'=>$request->s_description,

        ]);

        // if($p->status==1)
        // {
        // // dispatch(new NewProductEmail($p));
        // }

        if($request->hasFile('image')){
          
            $filename=$request->image;
     
            $name=time().'.'.str_replace(' ','',$filename->getClientOriginalName());
          
            $filename->storeAs('public/product',$name);
            $p->update([
                'image'=>$name,
            ]);
        }
        return redirect()->route('admin.product.index')->with('success','تم تعديل منتج بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    //     $p=Product::find($id);
    //     File::delete(public_path('storage/product/').$p->image);
    //     $p->delete();
    // return redirect()->route('admin.product.index');
    }
}
