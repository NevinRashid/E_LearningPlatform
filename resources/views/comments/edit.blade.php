@extends('main')
@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-comment-text-multiple"></i>
        </span> Comments
    </h3>
</div>
<form action="{{route('comments.update',$comment)}}" method="post">
    @csrf
    @method('PUT')
    <input type="hidden" name="comment_id" value="{{$comment->id}}">
    <div class="form-container" style="display: flex;align-items: center;">
        <input type="text" placeholder="add a comment" name="comment_text" value="{{$comment->comment_text}}" style="margin-left:20px; border: 2px solid black;border-radius: 12px;padding: 8px 12px;">
        <button type="submit" class="submit-btn" style=" width: 40px; height: 40px; background-color:#D8BFD8;border: none;border-radius: 50%;display: flex;justify-content: center;align-items: center;cursor: pointer;transition: background-color 0.3s;margin-left: 12px;">
                <!-- Inline SVG for the right arrow -->
            <svg class="arrow-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M10 17l5-5-5-5v10z"></path>
            </svg>
        </button>
    </div>
</form>
@endsection