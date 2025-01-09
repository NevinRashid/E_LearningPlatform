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
<h1>{{ $course->title }}</h1>
    

    <h3>Average Rating: {{ number_format($course->averageRating(), 1) }} / 5</h3>

    <form action="{{route('ratings.store',$course)}}" method="POST">
        @csrf
        <div class="rating-container">
            <input type="radio" id="star5" name="rating_value" value="5" required >
            <label for="star5" class="star">&#9733;</label> <!-- Star symbol for 5 -->
            
            <input type="radio" id="star4" name="rating_value" value="4">
            <label for="star4" class="star" >&#9733;</label> <!-- Star symbol for 4 -->
            
            <input type="radio" id="star3" name="rating_value" value="3">
            <label for="star3" class="star" >&#9733;</label> <!-- Star symbol for 3 -->
            
            <input type="radio" id="star2" name="rating_value" value="2">
            <label for="star2" class="star" >&#9733;</label> <!-- Star symbol for 2 -->
            
            <input type="radio" id="star1" name="rating_value" value="1">
            <label for="star1" class="star" >&#9733;</label> <!-- Star symbol for 1 -->
        </div>

        <button type="submit" class="btn btn-gradient-primary btn-fw" style="margin-top:20px;">submit</button>
    </form>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @elseif (session('error'))
        <p>{{ session('error') }}</p>
    @endif
    
@endsection