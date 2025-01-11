@extends('main')
@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-school menu-icon"></i>
        </span> Students
    </h3>
  </div>
  <div class="container my-5">
    <div class="row">
        @if (auth()->user()->hasRole('admin'))  
            <div class="col">
                <a href="{{ route('students.create') }}" class="btn btn-gradient-primary btn-lg mb-4 ">Add new Student</a>
            </div>
        @endif
    </div>
<div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">All Students</h4>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th> Name </th>
                  <th> Email </th>
                  <th> Mobile phone </th>
                  <th> Registered courses </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($students as $student)
                <tr>
                  <td>
                    <img src="{{ asset('storage/'.$student->image) }}" class="me-2" alt="student-image"> {{ $student->name}}
                  </td>
                  <td> {{ $student->email }} </td>
                  <td> {{ $student->phone }} </td>
                  <td> 
                    @foreach ($student->courses as $course)
                    <li>
                      <ul>{{ $course->title }}</ul>
                    </li>
                    @endforeach
                  </td>
                  <td>
                    @if (auth()->user()->hasRole('admin'))  
                      <div class="d-flex justify-content-center gap-2">
                        <a href="{{ route('students.show', $student) }}" class="btn btn-outline-success btn-sm">show</a>
                        <a href="{{ route('students.edit', $student) }}" class="btn btn-outline-info btn-sm">edit</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure to delete this student?')">delete</button>
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