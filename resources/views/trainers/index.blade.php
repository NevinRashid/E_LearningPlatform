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
                </tr>
              </thead>
              <tbody>
                @foreach ($trainers as $trainer)
                <tr>
                  <td>
                    <img src="{{ asset('storage/'.$trainer->image) }}" class="me-2" alt="trainer-image"> {{ $trainer->name}}
                  </td>
                  <td> {{ $trainer->email }} </td>
                  <td> {{ $trainer->phone }} </td>
                  <td> 
                    @foreach ($trainer->courses as $course)
                    <li>
                      <ul>{{ $course->title }}</ul>
                    </li>
                    @endforeach
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
        </div>
      </div>
    </div>
  </div>
@endsection