@extends('admin.layout.master')
@section('title', 'dasboard')
@section('content')
    <div class="container container-fluid">
        {{-- <div class="row"> --}}
        <div class="card card-plain ">
            <div class="card-body">
                <form class="form needs-validation" action="{{ route('admin.shipping.update', $shipping->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="mb-3 col-4">
                            <label>city</label>
                            <div class="mb-3">
                                <input type="name" name='city'
                                    class="form-control @error('city') is-invalid @enderror" value="{{ $shipping->city }}"
                                    placeholder="city" aria-label="name" aria-describedby="name-addon">
                                @error('city')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 col-4">
                            <label>shipping</label>
                            <div class="mb-3">
                                <input type="name" name='shipping'
                                    class="form-control @error('shipping') is-invalid @enderror" value="{{ $shipping->shipping }}"
                                    placeholder="shipping" aria-label="name" aria-describedby="name-addon">
                                @error('shipping')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 col-4">
                            <label>status</label>
                            <div class="mb-3">
                                <div class="form-check form-switch ps-0">
                                    <input class="form-check-input ms-auto" type="checkbox" name='status'
                                        id="flexSwitchCheckDefault" @checked($shipping->status == 1)>
                                    @error('status')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
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
    {{-- </div> --}}
@endsection
