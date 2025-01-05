<<<<<<< HEAD
<div class="col-md-4 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ $category->name }}</h4>
            <img src="{{ asset('imgs/'.$category->image) }}" class="img-fluid mx-auto d-block" >
            <a href="{{ route('categories.show',$category) }}" type="button" class="btn btn-gradient-info" style="margin-top:10px">Show</a>
        </div>
    </div>
</div>
=======
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
        
>>>>>>> Nevin_rashid
