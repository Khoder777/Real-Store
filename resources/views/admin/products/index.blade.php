@extends('admin.layout.master')
@section('title', 'dasboard')
@section('content')
    <div class="container-fluid py-4">
        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="row p-4">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">product Table</h6>
                        </div>
                        <div class="col-6 text-end">
                            <a class="btn bg-gradient-dark mb-0" href="{{ route('admin.product.create') }}"><i
                                    class="fas fa-plus"></i>&nbsp;&nbsp;Add New product</a>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            feature</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sub
                                            Category</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            brand</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Operations</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $p)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src={{ asset('storage/product/' . $p->image) }}
                                                            class="avatar avatar-sm me-3" alt="user1">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $p->name }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">
                                                        @if ($p->feature)
                                                            good
                                                        @else
                                                            not good
                                                        @endif
                                                    </h6>
                                                </div>
                        </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">{{ $p->subCategory->name }}</h6>
                            </div>
                    </div>
                    </td>
                    <td>
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $p->brand->name }}</h6>
                        </div>
                </div>
                </td>
                <td>
                    <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">
                            @if ($p->status)
                                Availbe
                            @else
                                Hidden
                            @endif
                        </h6>
                    </div>
            </div>
            </td>
            <td class="align-middle text-center text-sm">
                <div class="d-flex justify-content-center">
                    <a href="{{ route('admin.product.edit', ['id' => $p->id]) }}"> <button
                            class="btn btn-outline-info btn-sm mb-0 me-3">
                            Edit
                        </button></a>
                    <a href="{{ route('admin.product.show', ['id' => $p->id]) }}"> <button
                            class="btn btn-outline-warning btn-sm mb-0 me-3">
                            Show
                        </button></a>
                </div>
            </td>
            </tr>
            @endforeach
            </tbody>
            </table>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection
