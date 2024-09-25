<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cobon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CobonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cobons=Cobon::get();
        return view('admin.cobon.index',compact('cobons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.cobon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $vali=$request->validate([
            'code'=>'required',
            'amount'=>'required',
            'uses'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'status'=>'nullable',
        ]);
        Cobon::create([
            'code'=>$request->code,
            'amount'=>$request->amount,
            'uses'=>$request->uses,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'status'=>$request->status ? true : false,
        ]);
        return redirect()->route('admin.cobon.index')->with('success','تمت اضافة كوبون بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cobon $cobon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cobon=Cobon::find($id);
        return view('admin.cobon.edit',compact('cobon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $vali=$request->validate([
            'code'=>'required',
            'amount'=>'required',
            'uses'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'status'=>'nullable',
        ]);
        $c=Cobon::find($id);
        $c->update([
            'code'=>$request->code,
            'amount'=>$request->amount,
            'uses'=>$request->uses,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'status'=>$request->status ? true : false,
        ]);
        return redirect()->route('admin.cobon.index')->with('success','تم تعديل كوبون بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $c=Cobon::find($id);
        $c->delete();
        return redirect()->route('admin.cobon.index')->with('success','تم حذف كوبون جديدة');
    }
}
