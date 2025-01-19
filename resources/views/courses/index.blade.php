@extends('main')
@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-book-open-page-variant"></i>
        </span> Courses
    </h3>
</div>
<div class="row">
    @if (auth()->user()->hasRole('admin'))  
        <div class="col">
            <a href="{{ route('courses.create') }}" class="btn btn-gradient-primary btn-lg mb-4 ">Add new course</a>
        </div>
    @endif
</div>
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All Courses</h4>
                <div class="table-responsive">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th>Course Name</th>
                                <th>Level</th>
                                <th>Price</th>
                                <th>Capacity</th>
                                <th>Start Date</th>
                                <th>Category Name</th>
                                <th class="text-center">Actions</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $course)
                            <tr>
                                <td>{{$course->title}}</td>
                                <td>{{$course->level}}</td>
                                <td>{{$course->price}} $</td>
                                <td>{{$course->capacity}}</td>
                                <td>{{$course->start_date}}</td>
                                <td>{{$course->category?->name}}</td>
                                <td>
                                    @if (auth()->user()->hasRole('admin'))  
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('courses.show', $course) }}" class="btn btn-outline-success btn-sm">show</a>
                                        <a href="{{ route('courses.edit', $course) }}" class="btn btn-outline-info btn-sm">edit</a>
                                        <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure to delete this course?')">delete</button>
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
                            Showing {{ $courses->firstItem() }} to {{ $courses->lastItem() }} of {{ $courses->total() }} results
                        </small>
                    </div>
                    <div>
                        {{ $courses->links('vendor.pagination.bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
