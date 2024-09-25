@extends("admin.layout.master")
@section('title','dasboard')
@section('content')
    <div class="container-fluid py-4">
      @if(Session::has('success'))
      <div class="toast-container position-fixed top-0 start-50 translate-middle-x p-3">
        <div id='toast' class="toast align-items-center text-bg-success border-0 " role="alert" aria-live="assertive" aria-atomic="true">
          <div class="d-flex">
            <div class="toast-body">
             {{Session::get('success')}}
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
        </div>
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
      </div><br>


      <div class="row">
        <a href=' {{ route('admin.product.index') }}' class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Product Count</p>
                    <h5 class="font-weight-bolder mb-0">
                     {{ $product->count() }}<br>
                      <span class="text-success text-sm font-weight-bolder">
                        {{  $product->where('created_at', '>=',now()->subDay(7))->where('created_at', '<=', now())->count() }} Last Week
                      </span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
       </a>
       <a href=' {{ route('admin.shipping.index') }}' class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">city we can ship Count</p>
                    <h5 class="font-weight-bolder mb-0">
                      {{ $ship->count() }}<br>
                      <span class="text-success text-sm font-weight-bolder">
                        {{ $ship->where('created_at', '>=',now()->subDay(7))->where('created_at', '<=', now())->count() }} Last Week
                      </span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-spaceship text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        
       </a>
       <a href=' {{ route('admin.cobon.index') }}' class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Cobons Count</p>
                    <h5 class="font-weight-bolder mb-0">
                      {{ $cobon->count() }}<br>
                      <span class="text-success text-sm font-weight-bolder">
                        {{ $cobon->where('created_at', '>=',now()->subDay(7))->where('created_at', '<=', now())->count() }} Last Week
                      </span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-credit-card text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
        <a href=' {{ route('admin.customer.index') }}' class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Customer Count</p>
                    <h5 class="font-weight-bolder mb-0">
                      {{ $customer->count() }}<br>
                      <span class="text-success text-sm font-weight-bolder">
                        {{ $customer->where('created_at', '>=',now()->subDay(7))->where('created_at', '<=', now())->count() }} Last Week
                      </span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        
       </a>
      </div><br>
    <div>
      <h1><center>Real Store</center></h1>
      <h2><center>للكفالة و الضمانة عنوان</center></h2>
      <h3><center>وحيدون لكننا الأفضل</center></h3>
      <h5><center>احذروا التقليد</center></h5>
    </div>
      

 



      @endsection

      @section('scripts')
<script>

const toastLiveExample = document.getElementById('toast');
const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample);
toastBootstrap.show();

</script>

      @endsection