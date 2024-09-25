<?php

namespace App\Http\Controllers\Site;

use App\Models\Cart;
use App\Models\ship;

use App\Models\User;
use App\Models\Cobon;
use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Http\Request;
use App\Models\ProductSizeColor;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Notifications\OrderNotification;

class CheckOutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carts = Cart::with('product_size_color.product')->get();
        $customer = Auth::guard('customers')->user();
        $cities = ship::get();
        return view('site.checkout.index', compact(['carts', 'customer', 'cities']));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $vali = $request->validate([
            'reciver_name' => 'required|string',
            'reciver_city' => 'required',
            'reciver_phone_number' => 'required',
            'reciver_address' => 'required',
            'reciver_town' => 'required',
            'cobon' => 'nullable',
        ]);
        // dd('asd');
        $customer = Auth::guard('customers')->user();
        $carts = $customer->carts;
        $sum=0;
        foreach ($carts as $cart)
         {
            if ($cart->product_size_color->product->status == 1) 
            {
                $product_size_color = ProductSizeColor::where('id', $cart->product_size_color_id)->first();
                if (!$cart->product_size_color->offer)
                {
                    if ($cart->product_size_color->price == $product_size_color->price)
                    {
                        if ($cart->product_size_color->quantity > $product_size_color->quantity) 
                        {
                            return redirect()->route('site.checkout')->with('error', 'لا يوجد الكمية المطلوبة من احد المنتجات الرجاء اعادة شحن السلة بالكامل');
                        } 
                    } 
                    else
                    {
                        return redirect()->route('site.checkout')->with('error', 'يوجد منتج تم تحديث سعره الرجاء اعادة شحن السلة بالكامل');
                    }
                } 
                else 
                {
                    if ($cart->product_size_color->offer != $product_size_color->offer) 
                    {
                        return redirect()->route('site.checkout')->with('error', 'يوجد منتج تم تحديث سعره الرجاء اعادة شحن السلة بالكامل');
                    } 
                    else 
                    {
                        if ($cart->product_size_color->quantity > $product_size_color->quantity) 
                        {
                            return redirect()->route('site.checkout')->with('error', 'لا يوجد الكمية المطلوبة من احد المنتجات الرجاء اعادة شحن السلة بالكامل');
                        } 
                    }
                }
            } 
            else 
            {
                return redirect()->route('site.checkout')->with('error', 'يوجد منتج منتج لم يعد متوفر الرجاء اعادة شحن السلة بالكامل');
            }
            $sum+=$cart->unit_price*$cart->quantity;
        }
        $total_price=$sum;
        $cobon=null;
        if ($request->cobon) 
        {
            $cobon = Cobon::where('code', $request->cobon)->where('status', 1)->where('uses', '>', 0)->where('start_date','<=',now())->where('end_date','>=',now())->first();
            if (!$cobon) 
            {
                return redirect()->route('site.checkout')->with('error', 'الكوبون غير صالح');
            } 
            else 
            {
                if($cobon->amount >= $sum)
                {
                    return redirect()->route('site.checkout')->with('error', 'السعر الاجمالي غير صالح لاستحدام الكوبون');
                }
                else
                {
                    $total_price=$sum-$cobon->amount;
                }
            }
        }
        $shipping=0;
        if($request->reciver_city)
        {
            $shipping=ship::where('id',$request->reciver_city)->first()->shipping;
        }
        $order=Order::create([
            'customer_id'=>Auth::guard('customers')->id(),
            'reciver_name' => $request->reciver_name,
            'reciver_city' => $request->reciver_city,
            'reciver_phone_number' => $request->reciver_phone_number,
            'reciver_address' => $request->reciver_address,
            'reciver_town' => $request->reciver_town,
            'cobon_id' => $cobon?->id ,
            'order_status'=>'pending',
            'total_price'=>$total_price+$shipping,
            ]);
        foreach($carts as $cart)
        {
            OrderItems::create([
                'order_id'=>$order->id,
                'product_size_colors_id'=>$cart->product_size_color_id,
                'quantity'=>$cart->quantity,
                'unit_price'=>$cart->product_size_color->offer ? $cart->product_size_color->offer : $cart->product_size_color->price,
            ]);
            $product_size_color=ProductSizeColor::where('id',$cart->product_size_color_id)->first();
            $product_size_color->update([
                'quantity'=>$product_size_color->quantity-$cart->quantity,

            ]);
            if($product_size_color->quantity==0)
            {
                $product_size_color->product->update([
                    'status'=>0,
                ]);
            }

            $cart->delete();
        }
        if($cobon)
        {
            $cobon->update([
                'uses'=>$cobon->uses-1,
            ]);
        }
        $admin=User::find(1);
        $admin->notify(new OrderNotification($order,$admin));
        return redirect()->route('site.checkout')->with('success', 'تم تسجيل طلب مشترياتك بنجاح');
    }




}
