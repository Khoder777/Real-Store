<?php

namespace App\Http\Controllers\Site;

use App\Models\Cart;
use App\Models\Cobon;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Catch_;
use App\Models\ProductSizeColor;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer=Auth::guard('customers')->user();
        $carts=Cart::with('product_size_color.product','product_size_color.productSize.size','product_size_color.color')->get();
        return view('site.cart.index',compact(['carts','customer']));
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
            'unit_price'=>$product_size_color->offer!=0 ? $product_size_color->offer : $product_size_color->price,
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
    public function destroy($id)
    {
        $cart=Cart::find($id);
        if($cart){
            $cart->delete();
            return redirect()->back()->with('success','تم حذف المنتج من السلة');
        }
        return back()->with('error','لا تلعب ب منتجات غيرك يا حيوان');
       
    }

    public function incraseQuantity($id)
    {
        $cart=Cart::find($id);
        if($cart->quantity+1 > $cart->product_size_color->quantity)
        {
            return redirect()->route('site.cart.index')->with('error','هذا هو اقصى عدد من هذا المنتج متوفر حاليا');
        }
        $cart->update([ 
            'quantity'=>$cart->quantity+1,
        ]);
        return redirect()->route('site.cart.index')->with('success','تم زيادة منتج بنجاح');
    }

    public function dicraseQuantity($id)
    {
        $cart=Cart::find($id);
        if($cart->quantity==1)
        {
            return redirect()->route('site.cart.index')->with('success','لديك منتج واحد اذا كنت تريد الحذف اضغط الزر بجانب المنتج');
        }
        else
        $cart->update([ 
            'quantity'=>$cart->quantity-1,
        ]);
        return redirect()->route('site.cart.index')->with('success','تم انقاص منتج بنجاح');
    }

    public function applyCobon(Request $request)
    {
        $vali=$request->validate([
            'code'=>'required',
        ]);
        $cobon=Cobon::where('code',$request->code)->first();
        if($cobon)
        {
            $carts=Cart::get();
            $sum=0;
            foreach ($carts as $cart) {
                $sum += $cart->product_size_color->price * $cart->quantity;
            }
            return redirect()->route('site.cart.index')->with('price_after_cobon',$sum-$cobon->amount);
        }
    }
}
