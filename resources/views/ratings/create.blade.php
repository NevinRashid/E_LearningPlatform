@extends('main')
@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-star"></i>
        </span> Ratings
    </h3>
</div>

<div class="row">
    <form action="{{ route('ratings.store') }}" method="POST"  enctype="multipart/form-data" class="form-sample">
        @csrf
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add new rating</h5>
                    <div class="row">
                        <label class="col-sm-4 col-form-label">Your rating:</label>
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
                        
                        <div class="col-md-4">
                            <label class="col-sm-4 col-form-label">Courses:</label>
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
        <a href="{{ route('ratings.index') }}" class="btn btn-secondary btn-lg mb-4 ">Cancel</a>
    </form>
    
</div>


@if (session('success'))
    <p>{{ session('success') }}</p>
@elseif (session('error'))
    <p>{{ session('error') }}</p>
@endif

@endsection