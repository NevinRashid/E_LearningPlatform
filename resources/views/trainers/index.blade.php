@extends('main')
@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-account-tie menu-icon"></i>
        </span> Trainers
    </h3>
  </div>
  <div class="container my-5">
    <div class="row">
        @if (auth()->user()->hasRole('admin'))  
            <div class="col">
                <a href="{{ route('trainers.create') }}" class="btn btn-gradient-primary btn-lg mb-4 ">Add new trainer</a>
            </div>
        @endif
    </div>

@if ($trainers->count()>0)
<div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">All Trainers</h4>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th> Name </th>
                  <th> Email </th>
                  <th> Mobile phone </th>
                  <th> Assigned course </th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($trainers as $trainer)
                <tr>
                  <td>
                    @if (file_exists('storage/'.$trainer->image))
                      <img src="{{ asset('storage/'.$trainer->image) }}" class="me-2" alt=""> {{ $trainer->name}}
                    @else
                      <img src="{{asset('storage/images/face.webp')}}" class="me-2" alt=""> {{ $trainer->name}}
                    @endif                  
                  </td>
                  <td> {{ $trainer->email }} </td>
                  <td> {{ $trainer->phone }} </td>
                  <td> 
                    @if ($trainer->courses  && $trainer->courses->count()>0)
                      @foreach ($trainer->courses as $course)
                        <ul>
                          <li>{{ $course->title }}</li>
                        </ul>
                      @endforeach
                    @else
                        <p>There are no courses being taught</p>
                    @endif
                  </td>
                  <td>
                    @if (auth()->user()->hasRole('admin'))  
                      <div class="d-flex justify-content-center gap-2">
                        <a href="{{ route('trainers.show', $trainer) }}" class="btn btn-outline-success btn-sm">show</a>
                        <a href="{{ route('trainers.edit', $trainer) }}" class="btn btn-outline-info btn-sm">edit</a>
                        <form action="{{ route('trainers.destroy', $trainer->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure to delete this trainer?')">delete</button>
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
                Showing {{ $trainers->firstItem() }} to {{ $trainers->lastItem() }} of {{ $trainers->total() }} results
              </small>
            </div>
            <div>
                {{ $trainers->links('vendor.pagination.bootstrap-4') }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @else
  <div class="row">
      <p>There are no trainers currently</p>
  </div>
  @endif
@endsection