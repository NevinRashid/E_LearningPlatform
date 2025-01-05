@extends('main')
@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-file-multiple"></i>
        </span> Files
    </h3>
</div>
<ul>
@foreach($files as $file)
@if($file->type!='video')
<li><a href="{{'storage/'.$file->path }}" download>{{$file->name}}</a></li>
@endif
@endforeach
</ul>
<a href="{{ route('files.create') }}" class="btn btn-gradient-primary btn-fw" style="margin-top:20px;">Add file</a>
@endsection