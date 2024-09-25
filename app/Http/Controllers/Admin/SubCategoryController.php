<?php

namespace App\Http\Controllers\Admin;

use App\Models\subCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\Category;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subCategory=subCategory::with('category')->get();
        
        return view('admin.subCategories.index',compact('subCategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category=Category::all();
        return view('admin.subCategories.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $vali=$request->validate([
            'name'=>'required|string|max:255',
            'image'=>'required|mimes:png,jpg|max:8000',
            'category_id'=>'required|not_in:0'
        ]);
  
        if($request->hasFile('image')){
          
            $filename=$request->image;
     
            $name=time().'.'.str_replace(' ','',$filename->getClientOriginalName());
          
            $filename->storeAs('public/subCategory',$name);

        }
        subCategory::create([
            'name'=>$request->name,
            'image'=>$name,
            'category_id'=>$request->category_id
        ]);
        return redirect()->route('admin.subCategory.index')->with('success','تم اضافة فئة فرعية بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(subCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $subCategory=subCategory::find($id);
        $category=Category::all();
        return view('admin.subCategories.edit', compact(['subCategory','category']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $vali=$request->validate([
            'name'=>'required|string|max:255',
            'image'=>'nullable|image|mimes:png,jpg|max:8000',
            'category_id'=>'required|not_in:0'
        ]);
        $c=subCategory::find($id);
        $c->update([
            'name'=>$request->name,
            'category_id'=>$request->category_id
        ]);
        if($request->hasFile('image')){
            File::delete(public_path('storage/subCategory/').$c->image);
            $filename=$request->image;
       
            $name=time().'.'.str_replace(' ','',$filename->getClientOriginalName());
          
            $filename->storeAs('public/subCategory',$name);
            $c->update([
                'image'=>$name,
            ]);
        }
        
        return redirect()->route('admin.subCategory.index')->with('success','تم تعديل فئة فرعية بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $c=subCategory::find($id);

        File::delete(public_path('storage/subCategory/').$c->image);
        $c->delete();
    return redirect()->route('admin.subCategory.index');
    }
}
