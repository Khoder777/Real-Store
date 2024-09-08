@extends('admin.layout.master')
@section('title', 'dasboard')
@section('content')
    <div class="container container-fluid">
        {{-- <div class="row"> --}}
        <div class="card card-plain ">
            <div class="card-body">
                <form class="form needs-validation" action="{{ route('admin.ProductSizeColor.store') }}"
                    method="post"enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3">
                            <label>Choose Color</label>
                            <select name='color_id' class="form-select @error('color_id') is-invalid @enderror">
                                <option value='0'>Choose Color</option>
                                @foreach ($color as $c)
                                    <option value="{{ $c->id }}" @selected($c->id == old('color_id'))>
                                        {{ $c->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('color_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Choose Size</label>
                            <select name='productsize_id' class="form-select  @error('productsize_id') is-invalid @enderror">
                                <option value='0'>Choose Size</option>
                                @foreach ($product->productSizes as $size)
                                    <option value='{{ $size->id }}' @selected($size->id)>
                                        {{ $size->size->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('productsize_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                @enderror
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Price</label>
                            <div class="mb-3">
                                <input type="number" name='price'
                                    class="form-control @error('price') is-invalid @enderror" placeholder="Price"
                                    aria-label="Price" aria-describedby="name-addon" value="{{ old('price') }}">
                                @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Offer</label>
                            <div class="mb-3">
                                <input type="number" name='offer'
                                    class="form-control @error('offer') is-invalid @enderror" placeholder="offer"
                                    aria-label="Offer" aria-describedby="name-addon" value="{{ old('offer') }}">
                                @error('offer')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Quantity</label>
                            <div class="mb-3">
                                <input type="name" name='quantity'
                                    class="form-control @error('quantity') is-invalid @enderror" placeholder="Quantity"
                                    aria-label="Quantity" aria-describedby="name-addon" value="{{ old('quantity') }}">
                                @error('quantity')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Create</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    {{-- </div> --}}
@endsection
