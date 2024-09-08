<?php

namespace App\Http\Controllers\Admin;

use App\Models\brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands=brand::all();
        return view('admin.brands.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $vali=$request->validate([
            'name'=>'required|string|max:255',
            'image'=>'required|image|mimes:png,jpg|max:8000',
        ]);
     
        if($request->hasFile('image')){
          
            $filename=$request->image;
       
            $name=time().'.'.str_replace(' ','',$filename->getClientOriginalName());
          
            $filename->storeAs('public/brand',$name);

        }
        brand::create([
            'name'=>$request->name,
            'image'=>$name
        ]);
        return redirect()->route('admin.brand.index')->with('success','تم اضافة علامة تجارية بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $brand=brand::find($id);
        return view('admin.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $vali=$request->validate([
            'name'=>'required|string|max:255',
            'image'=>'nullable|image|mimes:png,jpg|max:8000',
        ]);
        $b=brand::find($id);
        $b->update([
            'name'=>$request->name,
        ]);
        if($request->hasFile('image')){
            File::delete(public_path('storage/brand/').$b->image);
            $filename=$request->image;
       
            $name=time().'.'.str_replace(' ','',$filename->getClientOriginalName());
          
            $filename->storeAs('public/brand',$name);
            $b->update([
                'image'=>$name,
            ]);
        }
        
        return redirect()->route('admin.brand.index')->with('success','تم تعديل علامة تجارية بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $b=brand::find($id);
        
        File::delete(public_path('storage/brand/').$b->image);
        $b->delete();
        return redirect()->route('admin.brand.index');
    }
}
