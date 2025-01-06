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
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Recent Courses</h4>
                <div class="table-responsive" style="overflow-x: auto;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Course Name</th>
                                <th>Description</th>
                                <th>Level</th>
                                <th>Price</th>
                                <th>Capacity</th>
                                <th>Start Date</th>
                                <th>Category Name</th>
                                <th>Actions</th> <!-- عمود الأزرار -->
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($courses as $course)
                            <tr>
                                <th>{{$course->title}}</th>
                                <th>{{$course->description}}</th>
                                <th>{{$course->level}}</th>
                                <th>{{$course->price}}</th>
                                <th>{{$course->capacity}}</th>
                                <th>{{$course->start_date}}</th>
                                <th>{{$course->category?->name}}</th>
                                <th><a href="{{route('courses.edit',$course->id)}}">edit</a></th>
                                <th><a href="{{route('course.destroy',$course->id)}}">destroy</a></th>
                                <th><a href="{{route('course.show',$course->id)}}">show</a></th>
                            </tr>
                            @endforeach
                            </tr>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 grid-margin">
        <a href="{{ route('courses.create') }}" class="btn btn-gradient-primary btn-fw" style="margin-top:20px;">Add Course</a>
    </div>

@endsection
