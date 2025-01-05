@extends('main')
@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-file-multiple"></i>
        </span> {{$file->name}}
    </h3>
</div>
<video width="100%" height="600px" controls>
    <source src="{{ asset('storage/'.$file->path) }}" type="video/mp4">
            Your browser does not support the video tag.
</video>

<div style="border:1px solid grey">
    <h3>{{$file->name}}</h3>
    <footer>published on {{$file->updated_at}}</footer>
</div>
@endsection