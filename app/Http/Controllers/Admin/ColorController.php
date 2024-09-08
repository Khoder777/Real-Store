<?php

namespace App\Http\Controllers\Admin;

use App\Models\Color;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colors=Color::all();
        return view('admin.colors.index',compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.colors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $vali=$request->validate([
            'name'=>'required|string|max:255',
            'color'=>'required|string|max:8000',
        ]);
     
        
        Color::create([
            'name'=>$request->name,
            'color'=>$request->color
        ]);
        return redirect()->route('admin.color.index')->with('success','تم اضافة لون بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $color=Color::find($id);
        return view('admin.colors.edit', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $vali=$request->validate([
            'name'=>'required|string|max:255',
           'color'=>'required|string|max:8000',
        ]);
        $c=Color::find($id);
        $c->update([
            'name'=>$request->name,
            'color'=>$request->color,
        ]);
        
        return redirect()->route('admin.color.index')->with('success','تم تعديل لون بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $c=Color::find($id);
        $c->delete();
        return redirect()->route('admin.color.index');
    }
}
