@extends('admin.layout.master')
@section('title', 'dasboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="card card-plain ">
                <div class="card-body">
                    <form class="form needs-validation" action="{{ route('admin.order.update', $order->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label>Choose Status</label>
                            <div class="mb-3">
                                <select name='order_status' class="form-select @error('order_status') is-invalid @enderror">
                                    <option value='0'>Choose order status</option>
                                    <option value="pending" @selected($order->order_status == 'pending')>pending</option>
                                    <option value="canceled" @selected($order->order_status == 'canceled')>canceled</option>
                                    <option value="delivered" @selected($order->order_status == 'delivered')>delivered</option>
                                    <option value="shipping" @selected($order->order_status == 'shipping')>shipping</option>
                                    <option value="preparing" @selected($order->order_status == 'preparing')>preparing</option>
                        

                                </select>
                                @error('order_status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Edit</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
