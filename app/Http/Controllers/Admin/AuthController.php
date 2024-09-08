<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
  
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|max:255|min:8',
           
            ]);
          
            if(Auth::attempt($credentials,$request->remember_me)){
                $request->session()->regenerateToken();
                return redirect()->route('admin.home')->with('success','اهلا و سهلا و مية مرحبا بالادمن الغالي');
            }
            else{
                return back()->with('error','البيانات خاطئة يا زعيمنا');
            }

    }
    public function logout(Request $request)
    {
        Auth::logout();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

}
