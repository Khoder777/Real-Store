@extends("admin.layout.master")
@section('title','dasboard')
@section('content')
<div class="container-fluid py-4">
  @if(Session::has('success'))
  <div class="alert alert-success">
  {{Session::get('success')}}
  </div>
  @endif
  @if(Session::has('error'))
  <div class="alert alert-danger">
  {{Session::get('error')}}
  </div>
  @endif
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="row p-4">
              <div class="col-6 d-flex align-items-center">
                <h6 class="mb-0">color Table</h6>
              </div>
              <div class="col-6 text-end">
                <a class="btn bg-gradient-dark mb-0" href="{{ route('admin.color.create') }}"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New color</a>
              </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">color</th>
                      <th class="text-secondary opacity-7 text-center">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($colors as $c)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $c->name }}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column">
                          <input type="color" class="form-control" value="{{ $c->color }}" style="width: 50px;margin-left:275px">
                        </div>
                      </div>    
                      </td>
                      <td>
                        <div class="d-flex justify-content-center">
                        <a href="{{ route('admin.color.edit', ['id' => $c->id]) }}"> <button class="btn btn-outline-info btn-sm mb-0 me-3">
                          Edit
                           </button></a>
                           <form action="{{ route('admin.color.delete', ['id' => $c->id]) }}" method='post'>
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-outline-danger btn-sm mb-0 me-3">
                           Delete
                             </button>
                           </form>
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