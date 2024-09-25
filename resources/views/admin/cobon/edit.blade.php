@extends('admin.layout.master')
@section('title', 'dasboard')
@section('content')
    <div class="container container-fluid">
        {{-- <div class="row"> --}}
        <div class="card card-plain ">
            <div class="card-body">
                <form class="form needs-validation" action="{{ route('admin.cobon.update', $cobon->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="mb-3 col-4">
                            <label>code</label>
                            <div class="mb-3">
                                <input type="name" name='code'
                                    class="form-control @error('code') is-invalid @enderror" value="{{ $cobon->code }}"
                                    placeholder="code" aria-label="name" aria-describedby="name-addon">
                                @error('code')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 col-4">
                            <label>amount</label>
                            <div class="mb-3">
                                <input type="name" name='amount'
                                    class="form-control @error('amount') is-invalid @enderror" value="{{ $cobon->amount }}"
                                    placeholder="amount" aria-label="name" aria-describedby="name-addon">
                                @error('amount')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 col-4">
                            <label>uses</label>
                            <div class="mb-3">
                                <input type="name" name='uses'
                                    class="form-control @error('uses') is-invalid @enderror" value="{{ $cobon->uses }}"
                                    placeholder="uses" aria-label="name" aria-describedby="name-addon">
                                @error('uses')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 col-4">
                            <label>status</label>
                            <div class="mb-3">
                                <div class="form-check form-switch ps-0">
                                    <input class="form-check-input ms-auto" type="checkbox" name='status'
                                        id="flexSwitchCheckDefault" @checked($cobon->status == 1)>
                                    @error('status')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 col-4">
                            <label>start date</label>
                            <div class="mb-3">
                                <input type="date" name='start_date'
                                    class="form-control @error('start_date') is-invalid @enderror" value="{{ $cobon->start_date }}"
                                    placeholder="start_date" aria-label="name" aria-describedby="name-addon">
                                @error('start_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 col-4">
                            <label>end date</label>
                            <div class="mb-3">
                                <input type="date" name='end_date'
                                    class="form-control @error('end_date') is-invalid @enderror" value="{{ $cobon->end_date }}"
                                    placeholder="end_date" aria-label="name" aria-describedby="name-addon">
                                @error('end_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
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
    {{-- </div> --}}
@endsection
