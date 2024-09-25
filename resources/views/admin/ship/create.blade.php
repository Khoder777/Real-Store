@extends('admin.layout.master')
@section('title','dasboard')
@section('content')
<div class="container-fluid">
            <div class="row">
                <div class="card card-plain ">
                  <div class="card-body">
                    <form class="form needs-validation" action="{{ route('admin.shipping.store') }}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="mb-3">
                      <label>city</label>
                      <div class="mb-3">
                        <input type="name" name='city' class="form-control @error('city') is-invalid @enderror" value="{{ old('city') }}" placeholder="enter the city name" aria-label="name" aria-describedby="name-addon">
                        @error('city')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>  
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>shipping</label>
                        <div class="mb-3">
                          <input type="name" name='shipping' class="form-control @error('shipping') is-invalid @enderror" value="{{ old('shipping') }}" placeholder="enter the price to this city" aria-label="name" aria-describedby="name-addon">
                          @error('shipping')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>  
                          @enderror
                      </div>
                      <div class="mb-3 col-4">
                        <label>status:to make the price to this ship zero</label>
                        <div class="mb-3">
                            <div class="form-check form-switch ps-0">
                                <input class="form-check-input ms-auto" type="checkbox" name='status'
                                    id="flexSwitchCheckDefault">
                                @error('status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
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
     @endsection
    