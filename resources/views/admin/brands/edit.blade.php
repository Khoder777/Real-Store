@extends('admin.layout.master')
@section('title', 'dasboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="card card-plain ">
                <div class="card-body">
                    <form class="form needs-validation" action="{{ route('admin.brand.update',$brand->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label>name</label>
                            <div class="mb-3">
                                <input type="name" name='name' value="{{ $brand->name }}"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="name"
                                    aria-label="name" aria-describedby="name-addon">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <label>Choose Image</label>
                            <div class="mb-3">
                                <input type='file' name='image'
                                    class="form-control  @error('name') is-invalid @enderror" placeholder="image"
                                    aria-label="image" aria-describedby="image-addon">
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-12 mb-xl-0 mb-4">
                                        <img src="{{ asset('storage/brand/' . $brand->image) }}" alt="img-blur-shadow"
                                            class="img-fluid shadow border-radius-xl">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Edit</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
