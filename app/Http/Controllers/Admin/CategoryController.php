<?php

namespace App\Http\Controllers\Admin;

use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       abort_if(!Auth::user()->can('show_category'),403);
            $categories = category::with('subCategories')->get();
            return view('admin.categories.index', compact('categories'));
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_if(!Auth::user()->can('create_category'),403);
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        abort_if(!Auth::user()->can('create_category'),403);
        $vali = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:png,jpg|max:8000',
        ]);

        if ($request->hasFile('image')) {

            $filename = $request->image;

            $name = time() . '.' . str_replace(' ', '', $filename->getClientOriginalName());

            $filename->storeAs('public/category', $name);

        }
        category::create([
            'name' => $request->name,
            'image' => $name
        ]);
        return redirect()->route('admin.category.index')->with('success', 'تم اضافة فئة بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        abort_if(!Auth::user()->can('edit_category'),403);
        $category = category::find($id);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        abort_if(!Auth::user()->can('edit_category'),403);
        $vali = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:png,jpg|max:8000',
        ]);
        $c = category::find($id);
        $c->update([
            'name' => $request->name,
        ]);
        if ($request->hasFile('image')) {
            File::delete(public_path('storage/category/') . $c->image);
            $filename = $request->image;

            $name = time() . '.' . str_replace(' ', '', $filename->getClientOriginalName());

            $filename->storeAs('public/category', $name);
            $c->update([
                'image' => $name,
            ]);
        }

        return redirect()->route('admin.category.index')->with('success', 'تم تعديل فئة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        abort_if(!Auth::user()->can('delete_category'),403);
        $c = category::find($id);
        if (!$c->subCategories()->count()) {
            File::delete(public_path('storage/category/') . $c->image);
            $c->delete();
            return redirect()->route('admin.category.index');
        }
        return back()->with('error', 'لا يمكن حذف فئة تحتوي فئات فرعية');
    }

}
