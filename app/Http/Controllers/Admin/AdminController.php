<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort_if(!Auth::user()->can('show_admin'),403);
        $admins=User::get();
        return view('admin.admins.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_if(!Auth::user()->can('create_admin'),403);
        $roles=Role::get();
        return view('admin.admins.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        abort_if(!Auth::user()->can('create_admin'),403);
        $vali=$request->validate([
            'name' => 'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|max:255',
        ]);
        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        $user->syncRoles($request->roles);
        return redirect()->route('admin.admin.index');
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
    public function edit($id)
    {   
        abort_if(!Auth::user()->can('edit_admin'),403);
        $admin=User::find($id);
        $roles=Role::get();
        return view('admin.admins.edit',compact(['admin','roles']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        abort_if(!Auth::user()->can('edit_admin'),403);
        $vali=$request->validate([
            'name'=>'required|string',
            'roles'=>'array'
        ]);
        $user=User::find($id);
        if($user)
        {
            $user->update([
                'name'=>$request->name,
            ]);
            $user->syncRoles($request->roles);
            return redirect()->route('admin.admin.index');
        }else{
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
