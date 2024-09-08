<?php

namespace App\Http\Controllers\Site;

use App\Models\Cart;
use App\Http\Controllers\Controller;
use App\Models\ProductSizeColor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use PhpParser\Node\Stmt\Catch_;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carts=Cart::with('product_size_color.product')->get();
        return view('site.cart.index',compact('carts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $vali=$request->validate([
            'product_size_color_id'=>'required',
            'quantity'=>'required|integer',
        ],[
            'product_size_color_id.required'=>'يجب ادخال حجم و لون للمنتج المطلوب',
        ]);

        if(!Auth::guard('customers')->check())
        {
            return redirect()->back()->with('error','يجب عليك تسجيل الدخول للتمتع بخدماتنا');
        }

        $product_size_color=ProductSizeColor::where('id',$request->product_size_color_id)->first();

        if($request->product_size_color_id==null)
        {
            
            return redirect()->back()->with('error','يجب عليك اختيار حجم و لون للمنتج المطلوب');
        }

        if($request->quantity > $product_size_color->quantity)
        {
            return redirect()->back()->with('error','هذه الكمية غير متوفرة من هذا المنيج موجود فقط: '.$product_size_color->quantity);
        }
        $cart=Cart::where('product_size_color_id',$request->product_size_color_id)->first();
        if($cart)
        {
            if($request->quantity+$cart->quantity > $product_size_color->quantity)
            {
                return redirect()->back()->with('error','هذه الكمية غير متوفرة من هذا المنيج موجود فقط: '.$product_size_color->quantity);
            }
            $cart->update([
                
                'quantity'=>$request->quantity+$cart->quantity,
            ]);
            return redirect()->route('site.product',$cart->product_size_color->product->slug)->with('success','تم تعديل كمية المنتج في السلة');  
        }

        $create=Cart::create([
            'product_size_color_id'=>$request->product_size_color_id,
            'quantity'=>$request->quantity,
            'customer_id'=>Auth::guard('customers')->id(),
        ]);
        return redirect()->route('site.product',$create->product_size_color->product->slug)->with('success','تم اضافة منتج للسلة');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
