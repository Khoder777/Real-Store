<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders=Slider::all();
        return view('admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $vali=$request->validate([
            'status'=>'nullable',
            'image'=>'required|image|mimes:png,jpg|max:8000',
            'type'=>'required|in:main,end,side'
        ]);
     
        if($request->hasFile('image')){
          
            $filename=$request->image;
       
            $name=time().'.'.str_replace(' ','',$filename->getClientOriginalName());
          
            $filename->storeAs('public/slider',$name);

        }
        Slider::create([
            'status'=>$request->status ? true : false,
            'image'=>$name,
            'type'=>$request->type
        ]);
        return redirect()->route('admin.slider.index')->with('success','تم اضافة صورة بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $slider=Slider::find($id);
        return view('admin.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $vali=$request->validate([
            'status'=>'nullable',
            'image'=>'nullable|image|mimes:png,jpg|max:8000',
                'type'=>'required|in:main,end,side'
        ]);
        $s=Slider::find($id);
        $s->update([
            'status'=>$request->status ? true : false,
            'type'=>$request->type
        ]);
        if($request->hasFile('image')){
            File::delete(public_path('storage/slider/').$s->image);
            $filename=$request->image;
       
            $name=time().'.'.str_replace(' ','',$filename->getClientOriginalName());
          
            $filename->storeAs('public/slider',$name);
            $s->update([
                'image'=>$name,
                
            ]);
        }
        
        return redirect()->route('admin.slider.index')->with('success','تم تعديل صورة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $s=Slider::find($id);
        File::delete(public_path('storage/slider/').$s->image);
        $s->delete();
        return redirect()->route('admin.slider.index');
    }
}
