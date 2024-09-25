@extends('site.layout.master')
@section('content')


        <!-- Fruits Shop Start-->
        <div class="container-fluid fruite py-5">
            <div class="container py-5">
                <h1 class="mb-4">Fresh fruits shop</h1>
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="row g-4">
                            <div class="col-xl-3">
                                <div class="input-group w-100 mx-auto d-flex">
                                    <input id="search" value='{{ request('search') }}' type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                                    <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                                </div>
                            </div>
                            <div class="col-6"></div>
                        
                        </div>
                        <div class="row g-4">
                            <div class="col-lg-3">
                                <div class="row g-4">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <h4>Categories</h4>
                                            <ul class="list-unstyled fruite-categorie">
                                                @foreach ($categories as $category)
                                                <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a href="" onclick="addQueryParam('category','{{ $category->id }}')"><i class="fas fa-apple-alt me-2"></i>{{ $category->name }}</a>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    @if(request('category'))
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <h4>sub Categories</h4>
                                            <ul class="list-unstyled fruite-categorie">
                                                @foreach ($subCategories as $subCategory)
                                                <li>
                                                    <div class="d-flex justify-content-between fruite-name">
                                                        <a href="" onclick="addQueryParam('subCategory','{{ $subCategory->id }}')"><i class="fas fa-apple-alt me-2"></i>{{ $subCategory->name }}</a>
                                                        <span>({{ $subCategory->products->count() }})</span>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <h4 class="mb-2">Price</h4>
                                            <input  type="range" class="form-range w-100" id="rangeInput" name="rangeInput" min="0" max="10000000" value="{{ request('price',0) }}" oninput="amount.value=rangeInput.value">
                                            <output id="amount" name="amount" min-velue="0" max-value="10000000" for="rangeInput">{{ request('price',0) }}</output>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <h4>Colors</h4>
                                            @foreach ($colors as $key=>$color)
                                            <div class="mb-2">
                                                <input type="radio" class="me-2" id="color{{ $key }}" value="{{ $color->id }}" @checked($color->id==request('color'))>
                                                <label for="color"> {{ $color->name }}</label>
                                           
                                               
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <h4>Sizes</h4>
                                            @foreach ($sizes as $key=>$size)
                                            <div class="mb-2">
                                              
                                                <input type="radio" class="me-2" id="size{{ $key }}" value="{{ $size->id }}"  @checked($size->id==request('size'))>
                                                <label for="size"> {{ $size->name }}</label>
                                           
                                               
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                   
                                    <div class="col-lg-12">
                                        <div class="position-relative">
                                            <img src="{{ asset('storage/slider/'.$slider->image) }}" class="img-fluid w-100 rounded" alt="">
                                            <div class="position-absolute" style="top: 50%; right: 10px; transform: translateY(-50%);">
                                                <h3 class="text-secondary fw-bold">Best <br> Products <br> For u</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="row g-4 justify-content-center">
                                    @foreach ($products as $product)
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

                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    @endforeach
                                   
                                    <div class="col-12">
                                        <div class="pagination d-flex justify-content-center mt-5">
                                            {{ $products->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fruits Shop End-->
@endsection
@section('scripts')
<script>
function addQueryParam(name, value) {
    var currentUrl=window.location.href;
    var newUrl=new URL(currentUrl);
    newUrl.searchParams.set(name, value);
    window.history.pushState({},'',newUrl);
    
    
}
window.document.getElementById('rangeInput').addEventListener('change',function(){
    var currentUrl=window.location.href;
    var newUrl=new URL(currentUrl);
        var price=window.document.getElementById('rangeInput').value;
        newUrl.searchParams.set('price',price);
        window.history.pushState({},'',newUrl);
        location.reload();
    });
    @foreach ($colors as $key=>$color)
    window.document.getElementById('color{{ $key }}').addEventListener('change',function(){
    var currentUrl=window.location.href;
    var newUrl=new URL(currentUrl);
        var color=window.document.getElementById('color{{ $key }}').value;
        newUrl.searchParams.set('color',color);
        window.history.pushState({},'',newUrl);
        location.reload();
    });
    @endforeach
    @foreach ($sizes as $key=>$size)
    window.document.getElementById('size{{ $key }}').addEventListener('change',function(){
    var currentUrl=window.location.href;
    var newUrl=new URL(currentUrl);
        var size=window.document.getElementById('size{{ $key }}').value;
        newUrl.searchParams.set('size',size);
        window.history.pushState({},'',newUrl);
        location.reload();
    });
    @endforeach
    window.document.getElementById('search').addEventListener('change',function(){
    var currentUrl=window.location.href;
    var newUrl=new URL(currentUrl);
        var search=window.document.getElementById('search').value;
        newUrl.searchParams.set('search',search);
        window.history.pushState({},'',newUrl);
        location.reload();
    });
</script>
@endsection