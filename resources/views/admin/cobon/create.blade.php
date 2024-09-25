@extends('admin.layout.master')
@section('title','dasboard')
@section('content')
<div class="container-fluid">
            <div class="row">
                <div class="card card-plain ">
                  <div class="card-body">
                    <form class="form needs-validation" action="{{ route('admin.cobon.store') }}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="mb-3">
                      <label>code</label>
                      <div class="mb-3">
                        <input type="name" name='code' class="form-control @error('code') is-invalid @enderror" value="{{ old('code') }}" placeholder="enter the code like : S7I2sda" aria-label="name" aria-describedby="name-addon">
                        @error('code')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>  
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>amount</label>
                        <div class="mb-3">
                          <input type="name" name='amount' class="form-control @error('amount') is-invalid @enderror" value="{{ old('amount') }}" placeholder="enter the the amont of discount" aria-label="name" aria-describedby="name-addon">
                          @error('amount')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>  
                          @enderror
                      </div>
                      <label>Max Uses</label>
                        <div class="mb-3">
                          <input type="name" name='uses' class="form-control @error('uses') is-invalid @enderror" value="{{ old('uses') }}" placeholder="enter max uses to this cobon" aria-label="name" aria-describedby="name-addon">
                          @error('uses')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>  
                          @enderror
                      </div>
                      <div class="mb-3 col-4">
                        <label>status:to make the Cobon enable or Disable</label>
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
                        <label>start date</label>
                        <div class="mb-3">
                          <input type="date" name='start_date' class="form-control @error('start_date') is-invalid @enderror" value="{{ old('start_date') }}" placeholder="" aria-label="name" aria-describedby="name-addon">
                          @error('start_date')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>  
                          @enderror
                      </div>
                      <label>start_date</label>
                        <div class="mb-3">
                          <input type="date" name='end_date' class="form-control @error('end_date') is-invalid @enderror" value="{{ old('end_date') }}" placeholder="" aria-label="name" aria-describedby="name-addon">
                          @error('end_date')
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
     @endsection
    