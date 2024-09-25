@extends('site.layout.master')
@section('content')

    <!-- Single Product Start -->
    <div class="container-fluid py-5" style="margin-top: 70px">
        <div class="container py-5">
            <div class="row g-4 mb-5">
                <div class="col-lg-8 col-xl-9">
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="border rounded">
                                <a href="#">
                                    <img src="{{ asset('storage/product/' . $product->image) }}"
                                        style="width:400px;height:400px" class="img-fluid rounded" alt="Image">
                                </a>
                            </div>
                        </div>
                        @php
                            $s = $product->ProductSizeColors->where('id', request('productcolor', ''))->first();
                        @endphp
                        <div class="col-lg-6">
                            <h4 class="fw-bold mb-3">{{ $product->name }}</h4>
                            <p class="mb-3">Category: {{ $product->subCategory->category->name }}</p>
                            <h5 class="fw-bold mb-3">
                                @if ($s ? $s->currency_offer : $product->ProductSizeColors->first()->currency_offer)
                                    <h6 class="text-dark fs-5 fw-bold mb-0">
                                        {{ $s ? $s->currency_offer : $product->ProductSizeColors->first()->currency_offer }}
                                    </h6>
                                    <h6 class="text-danger text-decoration-line-through">
                                        {{ $s ? $s->currency_offer : $product->ProductSizeColors->first()->currency_price }}
                                    </h6>
                                @else
                                    <p class="text-dark fs-5 fw-bold mb-0">
                                        {{ $s ? $s->currency_offer : $product->ProductSizeColors->first()->currency_price }}
                                    </p>
                                @endif
                            </h5>

                            {{-- <div class="d-flex mb-4">
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star"></i>
                                </div> --}}
                            <p class="">{{ $product->s_description }}</p>
                            <ul class="input-group d-inline p-0 ">Size:
                                @foreach ($product->productSizes as $productSize)
                                    <li class="input-group d-inline ml-1"><a
                                            href="{{ route('site.product', $product->slug) }}?productSize={{ $productSize->id }}">{{ $productSize->size->name }}
                                        </a></li>
                                @endforeach
                            </ul><br><br>
                            <ul class="input-group d-inline p-0 pb-4">Color:
                                @foreach ($product->ProductSizeColors()->where('productsize_id', request('productSize', ''))->get() as $productcolorsize)
                                    <li class="input-group d-inline ml-1">
                                        <a class="" href="{{ route('site.product', $product->slug) }}?productSize={{ $productcolorsize->productsize_id }}&productcolor={{ $productcolorsize->id }}">
                                            <div class="d-inline-block" style="width: 20px; height: 20px;border-radius: 50%; background-color:{{ $productcolorsize->color->color }}">
                                            </div>
                                        </a>
                                        
                                    </li>
                                @endforeach
                            </ul><br><br>
                            <form method="POST" action="{{ route('site.cart.store') }}">
                                @csrf
                                <input type="hidden" name='product_size_color_id'
                                    value="{{ request('productcolor', '') }}">
                                <div class="input-group quantity mb-5" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <a class="btn btn-sm btn-minus rounded-circle bg-light border">
                                            <i class="fa fa-minus"></i>
                                        </a>
                                    </div>


                                    <input type="text" name='quantity'
                                        class="form-control form-control-sm text-center border-0" value="1">
                                    <div class="input-group-btn">
                                        <a class="btn btn-sm btn-plus rounded-circle bg-light border">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                </div>

                                <button type="submit"
                                    class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary">Add to
                                    cart</button>
                                    @error('product_size_color_id')
                                    <div class="alert alert-danger">
                                          {{ $message }}
                                        </div>  
                                        @enderror
                            </form>
                            @if (Session::has('error'))
                                <div class="alert alert-danger">
                                    {{ Session::get('error') }}
                                </div>
                            @endif
                            @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        </div>
                        <div class="col-lg-12">
                            <nav>
                                <div class="nav nav-tabs mb-3">
                                    <button class="nav-link active border-white border-bottom-0" type="button"
                                        role="tab" id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about"
                                        aria-controls="nav-about" aria-selected="true">Description</button>
                                </div>
                            </nav>
                            <div class="tab-content mb-5">
                                <div class="tab-content mb-5">
                                    <div class="tab-pane active" id="nav-about" role="tabpanel"
                                        aria-labelledby="nav-about-tab">
                                        <p>{{ $product->description }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="#">
                            <h4 class="mb-5 fw-bold">Leave a Reply</h4>
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <div class="border-bottom rounded">
                                        <input type="text" class="form-control border-0 me-4" placeholder="Yur Name *">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="border-bottom rounded">
                                        <input type="email" class="form-control border-0" placeholder="Your Email *">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="border-bottom rounded my-4">
                                        <textarea name="" id="" class="form-control border-0" cols="30" rows="8"
                                            placeholder="Your Review *" spellcheck="false"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="d-flex justify-content-between py-3 mb-5">
                                        <div class="d-flex align-items-center">
                                            <p class="mb-0 me-3">Please rate:</p>
                                            <div class="d-flex align-items-center" style="font-size: 12px;">
                                                <i class="fa fa-star text-muted"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <a href="#"
                                            class="btn border border-secondary text-primary rounded-pill px-4 py-3"> Post
                                            Comment</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3">
                    <div class="row g-4 fruite">
                        <div class="col-lg-12">
                            <div class="input-group w-100 mx-auto d-flex mb-4">
                                <input type="search" class="form-control p-3" placeholder="keywords"
                                    aria-describedby="search-icon-1">
                                <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                            </div>

                        </div>
                        <div class="col-lg-12">
                            <h4 class="mb-4">Featured products</h4>
                            @foreach ($feature_products as $product)
                                <a href="{{ route('site.product', $product->slug) }}?productSize={{ $product->ProductSizes->first()->id }}&productcolor={{ $product->ProductSizeColors->first()->id }}">
                                    <div class="d-flex align-items-center justify-content-start mt-1">

                                        <div class="rounded" style="width: 100px; height: 100px;">
                                            <img src="{{ asset('storage/product/' . $product->image) }}"
                                                class="img-fluid rounded" alt="Image">
                                        </div>
                                        <div>
                                            <h6 class="mb-2">{{ $product->name }}</h6>
                                            <div class="d-flex mb-2">
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="d-flex mb-2">
                                                <h5 class="fw-bold me-2">2.99 $</h5>
                                                <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                                            </div>

                                        </div>

                                    </div>
                            @endforeach
                            {{-- <div class="d-flex justify-content-center my-4">
                                    <a href="#" class="btn border border-secondary px-4 py-3 rounded-pill text-primary w-100">Vew More</a> --}}
                            {{-- </div> --}}
                        </div>
                        <div class="col-lg-12">
                            <div class="position-relative">
                                <img src="img/banner-fruits.jpg" class="img-fluid w-100 rounded" alt="">
                                <div class="position-absolute"
                                    style="top: 50%; right: 10px; transform: translateY(-50%);">
                                    <h3 class="text-secondary fw-bold">Fresh <br> Fruits <br> Banner</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if ($realted_product->count() > 0)
                <div class="container-fluid vesitable py-5">
                    <div class="container py-5">
                        <h1 class="mb-0">Realted Products</h1>
                        <div class="vesitable">
                            <div class="owl-carousel vegetable-carousel justify-content-center">
                                @foreach ($realted_product as $product)
                                    <a href="{{ route('site.product', $product->slug) }}?productSize={{ $product->ProductSizes->first()->id }}&productcolor={{ $product->ProductSizeColors->first()->id }}">
                                        <div>
                                            <div class="vesitable-img">
                                                <img src="{{ asset('storage/product/' . $product->image) }}"
                                                    style="width:100%;height:200px" class="img-fluid w-100 rounded-top"
                                                    alt="">
                                            </div>
                                            <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                                                style="top: 10px; right: 10px;">
                                                {{ $product->subCategory->category->name }}</div>
                                            <div class="p-4 rounded-bottom">
                                                <h4>{{ $product->name }}</h4>
                                                <p>{{ $product->description }}</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    @if ($product->ProductSizeColors->first()->currency_offer)
                                                        <h6 class="text-dark fs-5 fw-bold mb-0">
                                                            {{ $product->ProductSizeColors->first()->currency_offer }}</h6>
                                                        <h6 class="text-danger text-decoration-line-through">
                                                            {{ $product->ProductSizeColors->first()->currency_price }}</h6>
                                                    @else
                                                        <p class="text-dark fs-5 fw-bold mb-0">
                                                            {{ $product->ProductSizeColors->first()->currency_price }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- Single Product End -->
@endsection
