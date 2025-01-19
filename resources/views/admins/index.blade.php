@extends('main')
@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="mdi mdi-shield-account btn-icon-append"></i>
        </span> Admins
    </h3>
  </div>
  <div class="container my-5">
    <div class="row">
        @if (auth()->user()->hasRole('admin'))  
            <div class="col">
                <a href="{{ route('admins.create') }}" class="btn btn-gradient-primary btn-lg mb-4 ">Add new Admin</a>
            </div>
        @endif
    </div>
<div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">All Admins</h4>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th> Name </th>
                  <th> Email </th>
                  <th> Mobile phone </th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($admins as $admin)
                <tr>
                  <td>
                    @if (file_exists('storage/'.$admin->image))
                      <img src="{{ asset('storage/'.$admin->image) }}" class="me-2" alt=""> {{ $admin->name}}
                    @else
                      <img src="{{asset('storage/images/face.webp')}}" class="me-2" alt=""> {{ $admin->name}}
                    @endif 
                  </td>
                  <td> {{ $admin->email }} </td>
                  <td> {{ $admin->phone }} </td>
                  <td>
                    @if (auth()->user()->hasRole('admin'))  
                      <div class="d-flex justify-content-center gap-2">
                        <a href="{{ route('admins.show', $admin) }}" class="btn btn-outline-success btn-sm">show</a>
                        <a href="{{ route('admins.edit', $admin) }}" class="btn btn-outline-info btn-sm">edit</a>
                        <form action="{{ route('admins.destroy', $admin->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure to delete this admin?')">delete</button>
                        </form>
                      </div>
                    @endif
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="d-flex justify-content-between align-items-center">
            <div class="text-muted" style="margin-top: 10px">
              <small>
                Showing {{ $admins->firstItem() }} to {{ $admins->lastItem() }} of {{ $admins->total() }} results
              </small>
            </div>
            <div>
                {{ $admins->links('vendor.pagination.bootstrap-4') }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col">
    {{ $admins->links() }}
  </div>
@endsection