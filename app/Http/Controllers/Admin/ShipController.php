<?php

namespace App\Http\Controllers\Admin;

use App\Models\ship;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shippings=ship::get();
        return view('admin.ship.index',compact('shippings'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ship.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $vali=$request->validate([
            'city'=>'required',
            'shipping'=>'required',
            'status'=>'nullable',
        ]);

        ship::create([
            'city'=>$request->city,
            'shipping'=>$request->shipping,
            'status'=>$request->status ? true : false,
        ]);
        return redirect()->route('admin.shipping.index')->with('success','تم اضافة عملية شحن جديدة');
    }

    /**
     * Display the specified resource.
     */
    public function show(ship $ship)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $shipping=ship::find($id);
       return view('admin.ship.edit',compact('shipping'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $vali=$request->validate([
            'city'=>'required',
            'shipping'=>'required',
            'status'=>'nullable',
        ]);
        $c=ship::find($id);
        $c->update([
          'city'=>$request->city,
            'shipping'=>$request->shipping,
            'status'=>$request->status ? true : false,
        ]);
        return redirect()->route('admin.shipping.index')->with('success','تم تعديل عملية شحن جديدة');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ship=ship::find($id);
        $ship->delete();
        return redirect()->route('admin.shipping.index')->with('success','تم حذف عملية شحن جديدة');
    }
}
