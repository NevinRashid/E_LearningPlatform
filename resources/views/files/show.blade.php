@extends('main')
@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-file-multiple"></i>
        </span> Files
    </h3>
</div>
<h1>{{ $file->name }}</h1>
@if($file->type=='video')
<video width="100%" height="600px" controls>
    <source src="{{ asset('storage/'.$file->path) }}" type="video/mp4">
            Your browser does not support the video tag.
</video>

@endif

@if($file->type!='video')
<iframe src="{{asset('storage/'.$file->path ) }}" width="100%" height="600px" frameborder="0"></iframe>
@endif
<div class="row">
    <div class="col">
        <a href="{{ route('files.index') }}" class="btn btn-gradient-primary btn-lg mb-4 " style="margin-top: 10px;">Back</a>
    </div>
</div>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @elseif (session('error'))
        <p>{{ session('error') }}</p>
    @endif

@endsection
<!--<button ></button>style="text-decoration: none;color:black;font-weight: bold;"!-->







