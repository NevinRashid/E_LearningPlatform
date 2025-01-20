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
@if ($students->count()>0)
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
                  <th></th>

                </tr>
              </thead>
              <tbody>
                @foreach ($students as $student)
                <tr>
                  <td>
                    @if (file_exists('storage/'.$student->image))
                      <img src="{{ asset('storage/'.$student->image) }}" class="me-2" alt=""> {{ $student->name}}
                    @else
                      <img src="{{asset('storage/images/face.webp')}}" class="me-2" alt=""> {{ $student->name}}
                    @endif
                  </td>
                  <td> {{ $student->email }} </td>
                  <td> {{ $student->phone }} </td>
                  <td> 
                    @if ($student->courses  && $student->courses->count()>0)
                      @foreach ($student->courses as $course)
                        <ul>
                          <li>{{ $course->title }}</li>
                        </ul>
                      @endforeach
                    @else
                        <p>There are no registered courses</p>
                    @endif
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
          <div class="d-flex justify-content-between align-items-center">
            <div class="text-muted" style="margin-top: 10px">
              <small>
                Showing {{ $students->firstItem() }} to {{ $students->lastItem() }} of {{ $students->total() }} results
              </small>
            </div>
            <div>
                {{ $students->links('vendor.pagination.bootstrap-4') }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @else
  <div class="row">
      <p>There are no students currently</p>
  </div>
  @endif
@endsection