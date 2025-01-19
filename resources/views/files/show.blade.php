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
<div style="border:1px solid white;background-color:white">
    <h3>{{$file->name}}</h3>
    <footer style="text-align:right">published on {{$file->updated_at}}</footer>
</div>
<div class="comments" style="border:1px solid white;background-color:white">
    <hr>
    <h3>Comments</h3>
    <form method="post" action="{{route('comments.store')}}">
        @csrf
        <input type="hidden" name="file_id" value="{{$file->id}}">
        <input type="hidden" name="course_id" value="{{$file->course_id}}">
        <div class="form-container" style="display: flex;align-items: center;">
            <input type="text" placeholder="add a comment" name="comment_text" style="margin-left:20px; border: 2px solid black;border-radius: 12px;padding: 8px 12px;">
            <button type="submit" class="submit-btn" style=" width: 40px; height: 40px; background-color:#D8BFD8;border: none;border-radius: 50%;display: flex;justify-content: center;align-items: center;cursor: pointer;transition: background-color 0.3s;margin-left: 12px;">
                <!-- Inline SVG for the right arrow -->
                <svg class="arrow-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M10 17l5-5-5-5v10z"></path>
                </svg>
            </button>
        </div>
        
    </form>
    @foreach($comments as $comment)
        <hr>
        <div class="comment" style="border:1px solid white;background-color:white">
            <h5><b>{{$comment->user->name}}</b></h5>
            <p>{{$comment->comment_text}}</p>
            <div class="buttons" style="display: flex;justify-content: flex-end;gap: 10px;margin-right:20px">
                <button style="border:1px solid white;background-color:white"><a href="{{route('comments.edit',$comment)}}" style="text-decoration: none;color:black;font-weight: bold;">update</a></button>
                <form action="{{route('comments.destroy',$comment)}}" method="post">
                    @csrf
                    @method('Delete')
                    <input type="submit" value="delete"style="border:1px solid white;background-color:white">
                </form>
            </div>
        </div>
    @endforeach
</div>
@endif

@if($file->type!='video')
<iframe src="{{asset('storage/'.$file->path ) }}" width="100%" height="600px" frameborder="0"></iframe>
@endif

<!--
    
-->

    <h3>Average Rating: {{ number_format($file->course->averageRating(), 1) }} / 5</h3>

    <form action="{{route('ratings.store',$file->course)}}" method="POST">
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
<!--<button ></button>style="text-decoration: none;color:black;font-weight: bold;"!-->







