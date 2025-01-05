@extends('main')
@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-file-multiple"></i>
        </span> Courses
    </h3>
</div>
<h1 class="card-title">{{ $category->name }}</h4>
<ul>
    @foreach($courses as $course)
        <li><a href="{{route('courses.show',$course)}}">{{$course->title}}</a></li>
    @endforeach
</ul>
@endsection
        