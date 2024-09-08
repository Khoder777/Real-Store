@extends('admin.layout.master')
@section('title','dasboard')
@section('content')
<div class="container-fluid">
            <div class="row">
                <div class="card card-plain ">
                  <div class="card-body">
                    <form class="form needs-validation" action="{{ route('admin.color.store') }}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="mb-3">
                      <label>name</label>
                      <div class="mb-3">
                        <input type="name" name='name' class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="name" aria-label="name" aria-describedby="name-addon">
                        @error('name')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>  
                        @enderror
                    </div>
                      <label>Choose color</label>
                      <div class="mb-3">
                        <input type='color' name='color' class="form-control  @error('name') is-invalid @enderror" value="{{ old('color') }}" placeholder="color" aria-label="color" aria-describedby="color-addon">
                        @error('color')
                        <div class="invalid-feedback">
                          {{ $message }}
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
    