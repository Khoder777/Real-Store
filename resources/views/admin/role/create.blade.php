@extends('admin.layout.master')
@section('title', 'dasboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="card card-plain ">
                <div class="card-body">
                    <form class="form needs-validation" action="{{ route('admin.role.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label>name</label>
                            <div class="mb-3">
                                <input type="name" name='name'
                                    class="form-control @error('name') is-invalid @enderror" placeholder="name"
                                    aria-label="name" aria-describedby="name-addon" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <label>Choose Permissions</label>
                            <div class="mb-3">
                                <select class="js-example-basic-multiple form-select" name="permissions[]" multiple="multiple">
                                    @foreach ($permissions as $permission)
                                    <option value={{ $permission->id }}>{{ $permission->name }}</option>   
                                    @endforeach
                                </select>
                                @error('permission')
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
    @section('scripts')
        <script>
            $(document).ready(function() {
                $('.js-example-basic-multiple').select2();
            });
        </script>
@endsection