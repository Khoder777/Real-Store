<?php

namespace App\Http\Controllers\Admin;

use App\Models\Size;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sizes=Size::all();
        return view('admin.sizes.index',compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sizes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $vali=$request->validate([
            'name'=>'required|string|max:255',
        ]);
     
        
        Size::create([
            'name'=>$request->name,
        ]);
        return redirect()->route('admin.size.index')->with('success','تم اضافة حجم بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $size=Size::find($id);
        return view('admin.sizes.edit', compact('size'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $vali=$request->validate([
            'name'=>'required|string|max:255',
        ]);
        $s=Size::find($id);
        $s->update([
            'name'=>$request->name,
        ]);
        
        return redirect()->route('admin.size.index')->with('success','تم تعديل حجم بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $s=Size::find($id);
        $s->delete();
        return redirect()->route('admin.size.index');
    }
}
