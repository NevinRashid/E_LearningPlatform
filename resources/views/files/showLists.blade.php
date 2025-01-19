@extends('main')
@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-file-multiple"></i>
        </span> Files
    </h3>
</div>

<ul class="list-group">
@foreach ($categories as $category)
<li class="list-group-item">
    <a class="nav-link collapsed" data-bs-toggle="collapse" href="#ui-basic.{{$category->id}}" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">{{$category->name}}</span>
    </a>
    <div class="collapse" id="ui-basic.{{$category->id}}" style="">
        <ul class=" list-group nav flex-column sub-menu">
        @foreach ($category->courses as $course)
            <li class="list-group-item nav-item">
                <a class="nav-link" href="{{route('files.index', $course)}}">{{$course->title}}</a>
            </li>
        @endforeach
        </ul>
    </div>
</li>       
@endforeach
</ul>
@endsection