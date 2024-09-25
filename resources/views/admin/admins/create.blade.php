@extends('admin.layout.master')
@section('title','dasboard')
@section('content')
<div class="container-fluid">
            <div class="row">
                <div class="card card-plain ">
                  <div class="card-body">
                    <form class="form needs-validation" action="{{ route('admin.admin.store') }}" method="post" enctype="multipart/form-data">
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
                    <div class="mb-3">
                        <label>email</label>
                        <div class="mb-3">
                          <input type="email" name='email' class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="email" aria-label="name" aria-describedby="name-addon">
                          @error('email')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>  
                          @enderror
                      </div>
                      <div class="mb-3">
                        <label>password</label>
                        <div class="mb-3">
                          <input type="password" name='password' class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="password" aria-label="name" aria-describedby="name-addon">
                          @error('password')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>  
                          @enderror
                      </div>
                      <label>Choose Role</label>
                            <div class="mb-3">
                                <select name='roles[]' class="form-select @error('Role_id') is-invalid @enderror">
                                    <option value='0'>Choose Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}">
                                            {{ $role->name }}
                                        </option>
                                    @endforeach

                                </select>
                                @error('role_id')
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
    