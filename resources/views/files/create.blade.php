@extends('main')
@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-file-multiple"></i>
        </span> Files
    </h3>
</div>
<h1>Upload files to a course</h1>
    <form action="{{route('files.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        name: <input type="text" name="name"><br>
        description:<textarea name="description"></textarea><br>
        file: <input type="file" name="file"> <br>
        course: <select name="course">
                       @foreach($courses as $course)
                         <option value="{{$course->id}}">{{$course->title}}</option>
                       @endforeach
                    </select><br>
        <input type="submit" class="btn btn-gradient-primary btn-fw" style="margin-top:20px;">

    </form>
@endsection