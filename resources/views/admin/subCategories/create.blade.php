@extends('admin.layout.master')
@section('title','dasboard')
@section('content')
<div class="container-fluid">
            <div class="row">
                <div class="card card-plain ">
                  <div class="card-body">
                    <form class="form needs-validation" action="{{ route('admin.subCategory.store') }}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="mb-3">
                      <label>name</label>
                      <div class="mb-3">
                        <input type="name" name='name' class="form-control @error('name') is-invalid @enderror" placeholder="name" aria-label="name" aria-describedby="name-addon" value="{{ old('name') }}">
                        @error('name')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>  
                        @enderror
                    </div>
                      <label>Choose Image</label>
                      <div class="mb-3">
                        <input type='file' name='image' class="form-control  @error('name') is-invalid @enderror" value="{{ old('image') }}" placeholder="image" aria-label="image" aria-describedby="image-addon">
                        @error('image')
                        <div class="invalid-feedback">
                          {{ $message }}
                          @enderror 
                        </div>
                        <label>Choose Category</label>
                      <div class="mb-3">
                        <select name='category_id' class="form-select @error('category_id') is-invalid @enderror">
                            <option value='0'>Choose Category</option>
                            @foreach ($category as $c)
                            <option value='{{ $c->id }}' @selected($c->id==old('category_id'))>
                               {{ $c->name }} 
                            </option>
                            @endforeach
                            
                        </select>
                        @error('category_id')
                        <div class="invalid-feedback">
                          {{ $message }}
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
    