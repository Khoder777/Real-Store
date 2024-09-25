<?php

namespace App\Http\Controllers\Site;

use App\Models\ship;
use App\Models\brand;
use App\Models\Slider;
use App\Models\Product;
use App\Models\category;
use App\Models\Customer;
use App\Notifications\ContactNotification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Contact;
use App\Models\Size;
use App\Models\subCategory;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class SiteController extends Controller
{
    public function index()
    {
        // Cache::forget('products');
        if(Cache::get('products')){
            $products = Cache::get('products');
        }else{
            $products=Product::with('subCategory.category','ProductSizes','ProductSizeColors')->where('status',1)->inRandomOrder()->limit(8)->get();
            Cache::put('products',$products);
        }
        // Cache::forget('products');
        // $products=Product::with('subCategory.category','ProductSizes','ProductSizeColors')->where('status',1)->inRandomOrder()->limit(8)->get();
        $new_products=$products->where('created_at','>=',now()->subDays(7));
        $categories=category::inRandomOrder()->limit(4)->get();
        $brands=brand::inRandomOrder()->limit(4)->get();
        $main_slider=Slider::where('status',1)->where('type','main')->get();
        $end_slider=Slider::where('status',1)->where('type','end')->inRandomOrder()->first();
        return view('site.index',compact(['main_slider','categories','products','new_products','brands','end_slider']));
    }

    public function signin()
    {
        return view('site.auth.sign-in');
    }
    public function signup()
    {
        $cities=ship::get();
        return view('site.auth.sign-up',compact('cities'));
    }

    public function filter(Request $request)
    {
        $products=Product::
        where('status',1)
        ->when($request->query('category'),function($query)use($request){
            $query->whereHas('subCategory',function($query2) use($request){
                $query2->where('category_id',$request->query('category'));
            });
        })
        ->when($request->query('subCategory'),function($query)use($request){
            $query->where('sub_category_id',$request->query('subCategory'));
        })
        ->when($request->query('search'),function($query)use($request){
            $query->where('name','like','%'.$request->query('search').'%');
        })
        ->when($request->query('price'),function($query)use($request){
            $query->whereHas('ProductSizeColors',function($query2) use($request){
                $query2->where('price','>=',$request->query('price'))
                ->orWhere('offer','>=',$request->query('price'));
            });
        })
        ->when($request->query('size'),function($query)use($request){
            $query->whereHas('productSizes',function($query2) use($request){
                $query2->where('size_id',$request->query('size'));
            });
        })
        ->when($request->query('color'),function($query)use($request){
            $query->whereHas('ProductSizeColors',function($query2) use($request){
                $query2->where('color_id',$request->query('color'));
            });
        })
        ->paginate(4);
        $categories=category::get();
        $subCategories=subCategory::
        when($request->query('category'),function($query)use($request){
            $query->where('category_id',$request->query('category'));
        })
        ->get();
        $colors=Color::get();
        $sizes=Size::get();
        $slider=Slider::where('status',1)->where('type','side')->first();
        return view('site.shop.index',compact(['products','categories','subCategories','colors','sizes','slider']));
    }

    public function contact()
    {
        return view('site.contact.index');
    }

    public function sendContact(Request $request)
    {
        $vali=$request->validate([
            'full_name'=>'required|string',
            'email'=>'required|email',
            'message'=>'required|string',
        ]);
    $contact=Contact::create([
        'full_name'=>$request->full_name,
        'email'=>$request->email,
        'message'=>$request->message,
        'customer_id'=>Auth::guard('customers')->id(),
    ]);
    $admin=User::find(1);
    $admin->notify(new ContactNotification($contact));
    return redirect()->route('site.contact')->with('success','تم ارسال الرسالة بنجاح');
    }

    public function language($local){
        session()->put('lang',$local);
        return redirect()->back();
    }
}
