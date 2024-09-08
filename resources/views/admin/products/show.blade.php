@extends('admin.layout.master')
@section('title', 'dasboard')
@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="row p-4">
                        <div class="col-12 d-flex align-items-center">
                            <div class="ct-example"
                                style="position: relative;border: 2px solid #f5f7ff !important;border-bottom: none !important;padding: 1rem 1rem 2rem 1rem;margin-bottom: -1.25rem;">
                                <div class="card">

                                    <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                                        <img class="border-radius-lg w-50"
                                            src="{{ asset('storage/product/' . $product->image) }}" alt="Image placeholder">

                                        <div class="card-body">
                                            <h3 class="card-title mb-3">{{ $product->name }}</h3>

                                            <p class="card-text mb-4">{{ $product->description }}</p>

                                            <ul class="list-group list-group-flush mt-2">
                                                <li class="list-group-item">Category:
                                                    {{ $product->subCategory->category->name }}</li>
                                                <li class="list-group-item">Sub Category: {{ $product->subCategory->name }}
                                                </li>
                                                <li class="list-group-item">Brand: {{ $product->brand->name }}</li>
                                            </ul>
                                        </div>
                                        <a href="javascript:;" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </div>
                        </div>





                        <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
                          <div class="card h-100">
                            <div class="card-header pb-0">
                                <h6>Products Size</h6>
                                <p class="text-sm">
                                    <i class="ni ni-fat-add" aria-hidden="true"></i>
                                    <span class="font-weight-bold">Add Color</span> to This Product
                                    <a href="{{ route('admin.ProductSizeColor.create', ['id' => $product->id]) }}"> <button
                                            class="btn btn-outline-success btn-sm mb-0 me-3">
                                            Add
                                        </button></a>
                                </p>
                            </div>
                            <div class="card-body px-0 pt-0 pb-2">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Color</th>
                                                    <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Size</th>
                                                    <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Price</th>
                                                    <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Offer</th>
                                                    <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Quantity</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Status</th>
                                                <th class="text-secondary opacity-7"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($productColorSize as $item)
                                                <tr>
                                                  <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $item->color->name }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                    <td>
                                                        <div class="d-flex px-2 py-1">
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <h6 class="mb-0 text-sm">{{ $item->productSize->size->name}}</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                      <div class="d-flex px-2 py-1">
                                                          <div class="d-flex flex-column justify-content-center">
                                                              <h6 class="mb-0 text-sm">{{ $item->price }}</h6>
                                                          </div>
                                                      </div>
                                                  </td>
                                                  <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $item->offer }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                  <div class="d-flex px-2 py-1">
                                                      <div class="d-flex flex-column justify-content-center">
                                                          <h6 class="mb-0 text-sm">{{ $item->quantity }}</h6>
                                                      </div>
                                                  </div>
                                              </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>




                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card h-100">
                                <div class="card-header pb-0">
                                    <h6>Products Size</h6>
                                    <p class="text-sm">
                                        <i class="ni ni-fat-add" aria-hidden="true"></i>
                                        <span class="font-weight-bold">Add Size</span> to This Product
                                        <a href="{{ route('admin.ProductSize.create', ['id' => $product->id]) }}"> <button
                                                class="btn btn-outline-success btn-sm mb-0 me-3">
                                                Add
                                            </button></a>
                                    </p>
                                </div>
                                <div class="card-body px-0 pt-0 pb-2">
                                    <div class="table-responsive p-0">
                                        <table class="table align-items-center mb-0">
                                            <thead>
                                                <tr>
                                                    
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        Size</th>
                                                    <th
                                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Status</th>
                                                    <th class="text-secondary opacity-7"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($product->sizes as $size)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex px-2 py-1">
                                                                <div class="d-flex flex-column justify-content-center">
                                                                    <h6 class="mb-0 text-sm">{{ $size->name }}</h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
