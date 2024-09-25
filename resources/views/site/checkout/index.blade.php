@extends('site.layout.master')
@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Checkout</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">Checkout</li>
        </ol>
    </div>
    <!-- Single Page Header End -->
    <!-- Checkout Page Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <h1 class="mb-4">Billing details</h1>
            @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
        @endif
            <form action="{{ route('site.checkout.store') }}" method="post">
                @csrf
                <div class="row g-5">
                    <div class="col-md-12 col-lg-6 col-xl-7">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="form-item w-100">
                                    <label class="form-label my-3">Full Name<sup>*</sup></label>
                                    <input id='fullname' name='reciver_name' type="text" class="form-control" value="{{ request('fullname',$customer->full_name) }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Choose your City<sup>*</sup></label>
                                <select id="mySelect" name='reciver_city' class="form-select @error('city') is-invalid @enderror">
                                    <option value='0'>Choose City</option>
                                    @foreach ($cities as $c)
                                        <option value='{{ $c->id }}' @selected($c->id==request('select',$customer->city_id))>
                                            {{ $c->city }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('city')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                  
                                </div>
                                @enderror
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Town<sup>*</sup></label>
                            <input id="town" name="reciver_town" type="text" value="{{ request('town') }}" class="form-control">
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Address <sup>*</sup></label>
                            <input id="address" name="reciver_address" type="text" value="{{ request('address') }}" class="form-control" placeholder="House Number Street Name">
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Mobile<sup>*</sup></label>
                            <input id="phone" name="reciver_phone_number" type="tel" value="{{ request('phone',$customer->phone_number) }}" class="form-control" >
                        </div>
                        <div class="mt-5">
                            
                            <input id='cobon' name='cobon' type="text" name='code' class="border-0 border-bottom rounded me-5 py-3 mb-4" value="{{ request('cobon') }}" placeholder="Cobon Code">
                            <button id='button_cobon' class="btn border-secondary rounded-pill px-4 py-3 text-primary" type="button">Apply Cobon</button>
                            
                        </div>
                    </div>
                    
                    <div class="col-md-12 col-lg-6 col-xl-5">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Products</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($carts as $cart)
                                        <tr>
                                            <th scope="row">
                                                <div class="d-flex align-items-center mt-2">
                                                    <img src="{{ asset('storage/product/' . $cart->product_size_color->product->image) }}"
                                                        class="img-fluid rounded-circle" style="width: 90px; height: 90px;"
                                                        alt="">
                                                </div>
                                            </th>
                                            <td class="py-5">{{ $cart->product_size_color->product->name }}</td>
                                            <td class="py-5">{{ currency($cart->product_size_color->offer ? $cart->product_size_color->offer : $cart->product_size_color->price) }}</td>
                                            <td class="py-5">{{ $cart->quantity }}</td>
                                            <td class="py-5">
                                                {{ currency($cart->product_size_color->offer ? $cart->product_size_color->offer : $cart->product_size_color->price * $cart->quantity) }}
                                            </td>
                                        </tr>
                                    @endforeach

                                    <tr>
                                        <th scope="row">
                                        </th>
                                        <td class="py-5"></td>
                                        <td class="py-5"></td>
                                        <td class="py-5">
                                            <p class="mb-0 text-dark py-3">Subtotal</p>
                                        </td>
                                        <td class="py-5">
                                            <div class="py-3 border-bottom border-top">
                                                <p class="mb-0 text-dark">
                                                    @php
                                                    $sum = 0;
                                                        foreach ($carts as $cart) {
                                                            $sum += ($cart->product_size_color->offer ? $cart->product_size_color->offer : $cart->product_size_color->price) * $cart->quantity;
                                                        }
                                                    if(request('cobon')){
                                                        $cobon=App\Models\Cobon::where('code',request('cobon'))->first();
                                                        if($cobon)
                                                        {
                                                            $sum-=$cobon->amount;
                                                            
                                                        }
                                                    }
                                                        
                                                    @endphp

                                                    {{ currency($sum) }}
                                                </p>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        @php
                                        $city_id;
                                        $cities_id=$cities->pluck('id');
                                        foreach ($cities_id as $key => $city) {
                                            if(request('select')==$city)
                                        {
                                            $city_id= request('select');
                                            break;
                                        }
                                        else {
                                            $city_id=$customer->city_id;
                                            
                                        }
                                        }
                                        
                                        $s = $cities->where('id', $city_id)->first();
                                        @endphp
                                        <th scope="row">
                                        </th>
                                        <td class="py-5"></td>
                                        <td class="py-5"></td>
                                        <td class="py-5 w-100">
                                            <p class="mb-0 text-dark py-3">Shipping to:{{ $s->city }}</p>
                                        </td>
                                        <td class="py-5">
                                            <div class="py-3 border-bottom border-top">
                                                <p class="mb-0 text-dark">
                                                    {{ currency($s?->shipping)}}
                                                </p>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row">
                                        </th>
                                        <td class="py-5">
                                            <p class="mb-0 text-dark text-uppercase py-3">TOTAL Cost</p>
                                        </td>
                                        <td class="py-5"></td>
                                        <td class="py-5"></td>
                                        <td class="py-5">
                                            <div class="py-3 border-bottom border-top">
                                                <p class="mb-0 text-dark">{{ currency($sum+$s?->shipping) }}</p>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                            <button id="asd" type="submit"
                                class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">Place
                                Order</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Checkout Page End -->


@endsection
@section('scripts')
<script>

    window.document.getElementById('mySelect').addEventListener('change',function(){
        var fullname=window.document.getElementById('fullname').value;
        var phone=window.document.getElementById('phone').value;
        var address=window.document.getElementById('address').value;
        var town=window.document.getElementById('town').value;
        var selectedId=this.value;
        var currentUrl=window.location.href;
        var newUrl=new URL(currentUrl);
        newUrl.searchParams.set('select',selectedId);
        newUrl.searchParams.set('fullname',fullname);
        newUrl.searchParams.set('phone',phone);
        newUrl.searchParams.set('address',address);
        newUrl.searchParams.set('town',town);
        window.history.pushState({},'',newUrl);
        location.reload();
        
    });
    window.document.getElementById('button_cobon').addEventListener('click',function(){
            var cobon=window.document.getElementById('cobon').value;
            var fullname=window.document.getElementById('fullname').value;
        var phone=window.document.getElementById('phone').value;
        var address=window.document.getElementById('address').value;
        var town=window.document.getElementById('town').value;
        var selectedId=window.document.getElementById('mySelect').value;
        var currentUrl=window.location.href;
        var newUrl=new URL(currentUrl);
        newUrl.searchParams.set('select',selectedId);
        newUrl.searchParams.set('fullname',fullname);
        newUrl.searchParams.set('phone',phone);
        newUrl.searchParams.set('address',address);
        newUrl.searchParams.set('town',town);
        newUrl.searchParams.set('cobon',cobon);
        window.history.pushState({},'',newUrl);
        location.reload();
    });
</script>
@endsection