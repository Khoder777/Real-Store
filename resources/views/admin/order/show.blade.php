@extends('admin.layout.master')
@section('title', 'dasboard')
@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="row p-4">
                        {{-- <div class="col-12 d-flex align-items-center"> --}}
                        {{-- <div class="ct-example"
                                style="position: relative;border: 2px solid #f5f7ff !important;border-bottom: none !important;padding: 1rem 1rem 2rem 1rem;margin-bottom: -1.25rem;"> --}}
                        <div class="card">

                            <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">

                                <div class="card-body">
                                    <h3 class="card-title mb-3"></h3>

                                    <p class="card-text mb-4"></p>

                                    <ul class="list-group list-group-flush mt-2">
                                        <li class="list-group-item">customer name: {{ $order->reciver_name }}</li>
                                        <li class="list-group-item">reciver phone number: {{ $order->reciver_phone_number }}
                                        </li>
                                        <li class="list-group-item">reciver city:{{ $order->customers->Ship->city }}</li>
                                    </ul>
                                </div>
                                <a href="{{ route('admin.contact.index') }}" class="btn btn-primary">back to all emails</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card mb-4">
                    <div class="row p-4">
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
                            @foreach ($order->orderItems as $orderitem)
            
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center mt-2">
                                            <img src="{{ asset('storage/product/' . $orderitem->productSizeColors->product->image) }}"
                                                class="img-fluid rounded-circle" style="width: 90px; height: 90px;"
                                                alt="">
                                        </div>
                                    </th>
                                    <td class="py-5">{{ $orderitem->productSizeColors->product->name }}</td>
                                    <td class="py-5">{{ currency($orderitem->unit_price) }}</td>
                                    <td class="py-5">{{ $orderitem->quantity }}</td>
                                    <td class="py-5">
                                        {{ currency($orderitem->unit_price * $orderitem->quantity) }}
                                    </td>
                                </tr>
                            @endforeach

                            {{-- <tr>
                                <th scope="row">
                                </th>
                                <td class="py-5"></td>
                                <td class="py-5"></td>
                                <td class="py-5">
                                    <p class="mb-0 text-dark py-3">Subtotal</p>
                                </td>
                                <td class="py-5">
                                    <div class="py-3 border-bottom border-top">
                                        <p class="mb-0 text-dark"> --}}
                                            {{-- @php
                                            $sum = 0;
                                                foreach ($products as $product) {
                                                    $sum += ($product->product_size_color->offer ? $cart->product_size_color->offer : $cart->product_size_color->price) * $cart->quantity;
                                                }
                                            if(request('cobon')){
                                                $cobon=App\Models\Cobon::where('code',request('cobon'))->first();
                                                if($cobon)
                                                {
                                                    $sum-=$cobon->amount;
                                                    
                                                }
                                            }
                                                
                                            @endphp

                                            {{ currency($sum) }} --}}
                                        {{-- </p>
                                    </div>
                                </td>
                            </tr>
                            <tr> --}}
                                {{-- @php
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
                                </td> --}}
                            {{-- </tr>

                            <tr> --}}
                                {{-- <th scope="row">
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
                                </td> --}}
                            {{-- </tr> --}}
                        </tbody>
                    </table>
                </div>
               
            </div>
        </div>
    </div>



@endsection
