@extends('main')
@section('content')
<form method="GET" action="{{ route('courses.index') }}">
    <input type="text" name="name" placeholder="courses" value="{{ request('name') }}">
    <select name="category">
        <option value="">category</option>
        <option value="tech" {{ request('category') == 'tech' ? 'selected' : '' }}>technique</option>
        <option value="business" {{ request('category') == 'business' ? 'selected' : '' }}>business</option>
    </select>
    <select name="level">
        <option value=>level</option>
        <option value="beginner" {{ request('level') == 'beginner' ? 'selected' : '' }}>beginner</option>
        <option value="intermediate" {{ request('level') == 'intermediate' ? 'selected' : '' }}<intermediate</option>
        <option value="advanced" {{ request('level') == 'advanced' ? 'selected' : '' }}>advanced</option>
    </select>
    <input type="number" name="price" placeholder="maximum price" value="{{ request('price') }}">
    <button type="submit">filter</button>
</form>
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
                                <th><a href="{{route('courses.destroy',$course->id)}}">destroy</a></th>
                                <th><a href="{{route('courses.show',$course->id)}}">show</a></th>
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
    @if (auth()->user()->hasRole('admin'))  
    <div class="col-12 grid-margin">
        <a href="{{ route('courses.create') }}" class="btn btn-gradient-primary btn-fw" style="margin-top:20px;">Add Course</a>
    </div>
    <div class="courses">
    @foreach($courses as $course)
        <div class="course">
            <h3>{{ $course->name }}</h3>
            <p>category: {{ $course->category }}</p>
            <p>level: {{ $course->level }}</p>
            <p>price: {{ $course->price }}</p>
        </div>
    @endforeach
</div>
    @endif


@endsection
