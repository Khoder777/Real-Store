@extends('admin.layout.master')
@section('title', 'dasboard')
@section('content')
    <div class="container container-fluid">
        {{-- <div class="row"> --}}
        <div class="card card-plain ">
            <div class="card-body">
                <form class="form needs-validation" action="{{ route('admin.ProductSize.store') }}" method="post"enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3">
                            <select name='size_id' class="form-select @error('size_id') is-invalid @enderror">
                                <option value='0'>Choose Size</option>
                                @foreach ($size as $s)
                                <option value='{{ $s->id }}' @selected($s->id==old('size_id'))>
                                   {{ $s->name }} 
                                </option>
                                @endforeach
                            </select>
                            @error('size_id')
                            <div class="invalid-feedback">
                              {{ $message }}
                              @enderror  
                              <input type="hidden" name="product_id" value="{{ $id }}">
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
