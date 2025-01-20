@extends('main')
@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-comment-text-multiple"></i>
        </span> Comments
    </h3>
</div>

<div class="row">
    <form action="{{ route('comments.store') }}" method="POST"  enctype="multipart/form-data" class="form-sample">
        @csrf
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add new comment</h5>
                    <div class="row">
                        <div class="col-md-4">
                                <label class="col-sm-4 col-form-label">Comment text</label>
                                <div class="col-sm-9">
                                    <input type="text" name="comment_text" class="form-control" required>
                                </div>
                        </div>
                        
                        <div class="col-md-4">
                            <label class="col-sm-4 col-form-label">Courses</label>
                            <select name="course_id"  class="form-select" required >
                                @foreach($courses as $course)
                                <option value="{{$course->id}}">{{$course->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-gradient-primary btn-lg mb-4 " >Submit</button>
        <a href="{{ route('comments.index') }}" class="btn btn-secondary btn-lg mb-4 ">Cancel</a>
    </form>
    
</div>
@endsection