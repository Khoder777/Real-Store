@extends('admin.layout.master')
@section('title', 'dasboard')
@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="row p-4">
                        {{-- <div class="col-12 d-flex align-items-center"> --}}
                            {{-- <div class="ct-example"
                                style="position: relative;border: 2px solid #f5f7ff !important;border-bottom: none !important;padding: 1rem 1rem 2rem 1rem;margin-bottom: -1.25rem;"> --}}
                                <div class="card">

                                    <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                                    
                                        <div class="card-body">
                                            <h3 class="card-title mb-3"></h3>

                                            <p class="card-text mb-4"></p>

                                            <ul class="list-group list-group-flush mt-2">
                                                <li class="list-group-item">from: {{ $contact->full_name }}</li>
                                                <li class="list-group-item">with this email: {{ $contact->email }}</li>
                                                <li class="list-group-item"><h1>message:</h1><p>{{ $contact->message }}</p></li>
                                            </ul>
                                        </div>
                                        <a href="{{ route('admin.contact.index') }}" class="btn btn-primary">back to all emails</a>
                                    </div>
                                </div>
                            {{-- </div> --}}
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection