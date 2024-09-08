<?php

namespace App\Http\Controllers\Admin;

use App\Models\brand;
use App\Models\category;
use App\Models\Slider;
use App\Models\subCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $slider=Slider::where('status',1)->get(['id','created_at']);
        $category=category::get(['id','created_at']);
        $subCategory=subCategory::get(['id','created_at']);
        $brand=brand::get(['id','created_at']);
        return view('admin.index',compact(['category','subCategory','brand','slider']));
    }
}
