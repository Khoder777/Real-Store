@extends('admin.layout.master')
@section('title', 'dasboard')
@section('content')
    <div class="container container-fluid">
        {{-- <div class="row"> --}}
        <div class="card card-plain ">
            <div class="card-body">
                <form class="form needs-validation" action="{{ route('admin.product.store') }}" method="post"enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-4">
                            <label>name</label>
                            <div class="mb-3">
                                <input type="name" name='name'
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                    placeholder="name" aria-label="name" aria-describedby="name-addon">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 col-4">
                            <label>Choose Image</label>
                            <div class="mb-3">
                                <input type='file' name='image'
                                    class="form-control  @error('name') is-invalid @enderror" value="{{ old('image') }}"
                                    placeholder="image" aria-label="image" aria-describedby="image-addon">
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                            </div>
                        </div>
                        <div class="mb-3 col-4">
                            <label>feature</label>
                            <div class="mb-3">
                                <input type="checkbox" name='feature'>
                                @error('feature')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 col-4">
                            <label>Sub Category</label>
                            <div class="mb-3">
                                <select name='sub_category_id' class="form-select @error('sub_category_id') is-invalid @enderror">
                                    <option value='0'>Choose Sub Category</option>
                                    @foreach ($sub_category as $s)
                                    <option value='{{ $s->id }}' @selected($s->id==old('sub_category_id'))>
                                       {{ $s->name }} 
                                    </option>
                                    @endforeach
                                </select>
                                @error('sub_category_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 col-4">
                            <label>brand</label>
                            <div class="mb-3">
                                <select name='brand_id' class="form-select @error('brand_id') is-invalid @enderror">
                                    <option value='0'>Choose brand</option>
                                    @foreach ($brand as $b)
                                    <option value='{{ $b->id }}' @selected($b->id==old('brand_id'))>
                                       {{ $b->name }} 
                                    </option>
                                    @endforeach
                                </select>
                                @error('brand_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 col-4">
                            <label>status</label>
                            <div class="mb-3">
                                <input type="checkbox" name='status'>
                                @error('status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 col-6">
                            <label>description</label>
                            <div class="mb-3">
                                <textarea name='description' rows="4"
                                    class="form-control @error('description') is-invalid @enderror"
                                    value="{{ old('description') }}" placeholder="description" aria-label="description"
                                    aria-describedby="name-addon"></textarea>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 col-6">
                            <label>small description</label>
                            <div class="mb-3">
                                <textarea name='s_description' rows="4"
                                    class="form-control @error('s_description') is-invalid @enderror"
                                    value="{{ old('s_description') }}" placeholder="s_description" aria-label="s_description"
                                    aria-describedby="name-addon"></textarea>
                                @error('s_description')
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
        {{-- </div> --}}
@endsection
