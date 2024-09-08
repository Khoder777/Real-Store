@extends('admin.layout.master')
@section('title','dasboard')
@section('content')
<div class="container-fluid">
            <div class="row">
                <div class="card card-plain ">
                  <div class="card-body">
                    <form class="form needs-validation" action="{{ route('admin.size.store') }}" method="post" enctype="multipart/form-data">
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
    