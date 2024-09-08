@extends("admin.layout.master")
@section('title','dasboard')
@section('content')
    <div class="container-fluid py-4">
      @if(Session::has('success'))
        <div class="alert alert-success">
        {{Session::get('success')}}
        </div>
      @endif
      <div class="row">
        <a href=' {{ route('admin.category.index') }}' class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Category Count</p>
                    <h5 class="font-weight-bolder mb-0">
                     {{ $category->count() }}<br>
                      <span class="text-success text-sm font-weight-bolder">
                        {{  $category->where('created_at', '>=',now()->subDay(7))->where('created_at', '<=', now())->count() }} Last Week
                      </span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
       </a>
       <a href=' {{ route('admin.subCategory.index') }}' class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Sub Category Count</p>
                    <h5 class="font-weight-bolder mb-0">
                      {{ $subCategory->count() }}<br>
                      <span class="text-success text-sm font-weight-bolder">
                        {{ $subCategory->where('created_at', '>=',now()->subDay(7))->where('created_at', '<=', now())->count() }} Last Week
                      </span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-books text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        
       </a>
       <a href=' {{ route('admin.brand.index') }}' class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Brands Count</p>
                    <h5 class="font-weight-bolder mb-0">
                      {{ $brand->count() }}<br>
                      <span class="text-success text-sm font-weight-bolder">
                        {{ $brand->where('created_at', '>=',now()->subDay(7))->where('created_at', '<=', now())->count() }} Last Week
                      </span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-bold text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
        <a href=' {{ route('admin.slider.index') }}' class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Slider Count</p>
                    <h5 class="font-weight-bolder mb-0">
                      {{ $slider->count() }}<br>
                      <span class="text-success text-sm font-weight-bolder">
                        {{ $slider->where('created_at', '>=',now()->subDay(7))->where('created_at', '<=', now())->count() }} Last Week
                      </span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-album-2 text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        
       </a>
      </div>

      @endsection