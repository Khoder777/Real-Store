@extends('site.layout.master')
@section('content')
        <!-- Hero Start -->
        <div class="container-fluid py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-md-12 col-lg-7">
                        <h4 class="mb-3 text-secondary">For Everythings you Want</h4>
                        <h1 class="mb-5 display-3 text-primary">Real Store</h1>
                        <div class="position-relative mx-auto">
                            <input class="form-control border-2 border-secondary w-75 py-3 px-4 rounded-pill" type="number" placeholder="Search">
                            <button type="submit" class="btn btn-primary border-2 border-secondary py-3 px-4 position-absolute rounded-pill text-white h-100" style="top: 0; right: 25%;">Submit Now</button>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-5">
                        <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                @foreach ($main_slider as $key=>$slider)
                          
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }} rounded">
                                    <img src="{{ asset('storage/slider/'.$slider->image )}}"  style="width:100%;height:400px"  class="img-fluid bg-secondary rounded" alt="First slide">
                                   
                                </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->


        <div class="container-fluid service py-5">
            <div class="container py-5">
                <div class="row g-4 justify-content-center">
                    @foreach ($categories as $category)
                    <div class="col-md-6 col-lg-3">
                        <a href="#">
                            <div class="service-item bg-primary rounded border border-primary">
                                <img src="{{ asset('storage/category/'.$category->image )}}" style="width:100%;height:200px" class="img-fluid rounded-top" alt="">
                                <div class="px-4 rounded-bottom">
                                    <div class="service-content bg-secondary text-center p-4 rounded">
                                       
                                        <h3 class="mb-0">{{ $category->name }}</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Featurs End -->


        <!-- Fruits Shop Start-->
        <div class="container-fluid fruite py-5">
            <div class="container py-5">
                <div class="tab-class text-center">
                    <div class="row g-4">
                        <div class="col-lg-4 text-start">
                            <h1>Our Organic Products</h1>
                        </div>
                        <div class="col-lg-8 text-end">
                            <ul class="nav nav-pills d-inline-flex text-center mb-5">
                                <li class="nav-item">
                                    <a class="d-flex m-2 py-2 bg-light rounded-pill active" data-bs-toggle="pill" href="#tab-0">
                                        <span class="text-dark" style="width: 130px;">All Products</span>
                                    </a>
                                </li>
                            
                                <li class="nav-item">
                                    <a class="d-flex py-2 m-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-1">
                                        <span class="text-dark" style="width: 130px;">New products</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="d-flex py-2 m-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-2">
                                        <span class="text-dark" style="width: 130px;">Popular products</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div id="tab-0" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="row g-4">
                                        @foreach ($products as $product)
                                        <a href="{{ route('site.product',$product->slug) }}?productSize={{ $product->ProductSizes->first()->id }}&productcolor={{ $product->ProductSizeColors->first()->id }}" class="col-md-6 col-lg-4 col-xl-3">
                                        <div >
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="{{ asset('storage/product/'.$product->image )}}" style="width:100%;height:200px"  class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">{{ $product->subCategory->category->name }}</div>
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>{{ $product->name }}</h4>
                                                    <p>{{ $product->s_description }}</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        @if ( $product->ProductSizeColors->first()->currency_offer)
                                                        <h6 class="text-dark fs-5 fw-bold mb-0">{{ $product->ProductSizeColors->first()->currency_offer }}</h6>
                                                        <h6 class="text-danger text-decoration-line-through">{{ $product->ProductSizeColors->first()->currency_price }}</h6> 
                                                        @else
                                                        <p class="text-dark fs-5 fw-bold mb-0">{{ $product->ProductSizeColors->first()->currency_price }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-1" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="row g-4">
                                        @foreach ($new_products as $product)
                                        <a href="{{ route('site.product',$product->slug) }}?productSize={{ $product->ProductSizes->first()->id }}&productcolor={{ $product->ProductSizeColors->first()->id }}" class="col-md-6 col-lg-4 col-xl-3">
                                        <div>
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="{{ asset('storage/product/'.$product->image )}}" style="width:100%;height:200px"  class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">{{ $product->subCategory->category->name }}</div>
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>{{ $product->name }}</h4>
                                                    <p>{{ $product->s_description }}</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        @if ( $product->ProductSizeColors->first()->currency_offer)
                                                        <h6 class="text-dark fs-5 fw-bold mb-0">{{ $product->ProductSizeColors->first()->currency_offer }}</h6>
                                                        <h6 class="text-danger text-decoration-line-through">{{ $product->ProductSizeColors->first()->currency_price }}</h6> 
                                                        @else
                                                        <p class="text-dark fs-5 fw-bold mb-0">{{ $product->ProductSizeColors->first()->currency_price }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-2" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="row g-4">
                                        @foreach ($products as $product)
                                        <a href="{{ route('site.product',$product->slug) }}?productSize={{ $product->ProductSizes->first()->id }}&productcolor={{ $product->ProductSizeColors->first()->id }}" class="col-md-6 col-lg-4 col-xl-3">
                                        <div>
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="{{ asset('storage/product/'.$product->image )}}" style="width:100%;height:200px"  class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">{{ $product->subCategory->category->name }}</div>
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>{{ $product->name }}</h4>
                                                    <p>{{ $product->s_description }}</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        @if ( $product->ProductSizeColors->first()->currency_offer)
                                                        <h6 class="text-dark fs-5 fw-bold mb-0">{{ $product->ProductSizeColors->first()->currency_offer }}</h6>
                                                        <h6 class="text-danger text-decoration-line-through">{{ $product->ProductSizeColors->first()->currency_price }}</h6> 
                                                        @else
                                                        <p class="text-dark fs-5 fw-bold mb-0">{{ $product->ProductSizeColors->first()->currency_price }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                
                    
                    </div>
                </div>      
            </div>
        </div>
        <!-- Fruits Shop End-->


        


        <!-- Vesitable Shop Start-->
        <div class="container-fluid vesitable py-5">
            <div class="container py-5">
                <h1 class="mb-0">Featured Products</h1>
                <div class="owl-carousel vegetable-carousel justify-content-center">
                    @foreach ($products->where('feature',1) as $product)
                    <a href="{{ route('site.product',$product->slug) }}?productSize={{ $product->ProductSizes->first()->id }}&productcolor={{ $product->ProductSizeColors->first()->id }}" class="col-md-6 col-lg-4 col-xl-3">
                    <div class="border border-primary rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <img src="{{ asset('storage/product/'.$product->image )}}" style="width:100%;height:200px" class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">{{ $product->subCategory->category->name }}</div>
                        <div class="p-4 rounded-bottom">
                            <h4>{{ $product->name }}</h4>
                            <p>{{ $product->description }}</p>
                            <div class="d-flex justify-content-between flex-lg-wrap">
                                @if ( $product->ProductSizeColors->first()->currency_offer)
                                <h6 class="text-dark fs-5 fw-bold mb-0">{{ $product->ProductSizeColors->first()->currency_offer }}</h6>
                                <h6 class="text-danger text-decoration-line-through">{{ $product->ProductSizeColors->first()->currency_price }}</h6> 
                                @else
                                <p class="text-dark fs-5 fw-bold mb-0">{{ $product->ProductSizeColors->first()->currency_price }}</p>
                            </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
        <!-- Vesitable Shop End -->


@if($end_slider)
        <!-- Banner Section Start-->
        <div class="container-fluid banner bg-secondary my-5">
            <div class="container py-5">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-6">
                        <div class="py-4">
                            <h1 class="display-3 text-white">Fresh Exotic Fruits</h1>
                            <p class="fw-normal display-3 text-dark mb-4">in Our Store</p>
                            <p class="mb-4 text-dark">The generated Lorem Ipsum is therefore always free from repetition injected humour, or non-characteristic words etc.</p>
                            <a href="#" class="banner-btn btn border-2 border-white rounded-pill text-dark py-3 px-5">BUY</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="position-relative">
                            <img src="{{ asset('storage/slider/'.$end_slider->image ) }}" class="img-fluid w-100 rounded" alt="">
                            <div class="d-flex align-items-center justify-content-center bg-white rounded-circle position-absolute" style="width: 140px; height: 140px; top: 0; left: 0;">
                                <h1 style="font-size: 100px;">1</h1>
                                <div class="d-flex flex-column">
                                    <span class="h2 mb-0">50$</span>
                                    <span class="h4 text-muted mb-0">kg</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner Section End -->

@endif
      


        <!-- Fact Start -->
        <div class="container-fluid service py-5">
            <div class="container py-5">
                <div class="row g-4 justify-content-center">
                    @foreach ($brands as $brand)
                    <div class="col-md-6 col-lg-3">
                        <a href="#">
                            <div class="service-item bg-primary rounded border border-primary">
                                <img src="{{ asset('storage/brand/'.$brand->image )}}" style="width:100%;height:200px" class="img-fluid rounded-top" alt="">
                                <div class="px-4 rounded-bottom">
                                    <div class="service-content bg-secondary text-center p-4 rounded">
                                        <h3 class="mb-0">{{ $brand->name }}</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Fact Start -->


        

@endsection