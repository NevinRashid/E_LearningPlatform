@extends('main')
@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-file-multiple"></i>
        </span> Videos
    </h3>
</div>
@foreach($files as $file)
    @if($file->type=='video')
        <li><a href="{{route('files.show',$file->id)}}">{{$file->name}}</a></li>
    @endif
@endforeach

@endsection