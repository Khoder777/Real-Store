<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort_if(!Auth::user()->can('show_role'),403);
        $roles=Role::get();
        return view('admin.role.index',compact('roles'));
        
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_if(!Auth::user()->can('create_role'),403);
        $permissions=Permission::get();
        return view('admin.role.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        abort_if(!Auth::user()->can('create_role'),403);
        $vali=$request->validate([
            'name'=>'required|string',
            'permissions'=>'array'
        ]);
        $role=Role::create([
            'name'=>$request->name,
        ]);
        foreach($request->permissions as $permission)
        {
            $item=Permission::find($permission);
            $role->givePermissionTo($item);
        }
       
        return redirect()->route('admin.role.index')->with('success','تم اضافة دور بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
