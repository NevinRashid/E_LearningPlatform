

@extends('main')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="mt-4 text-center">Update Course</h2>
            <div class="card">
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('courses.update',$course) }}" method="POST">
                        @csrf 
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Course Name</label>
                            <input type="text" value="{{ $course->title }}" class="form-control" id="name" name="title" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <input class="form-control" type="text" value="{{ $course->description }}" id="description" name="description" rows="4" required></input>
                        </div>

                        <div class="form-group">
                            <label for="level">Level</label>
                            <input type="text"  value="{{ $course->level }}" class="form-control" id="level" name="level" required>
                        </div>

                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number"  value="{{ $course->price }}" class="form-control" id="price" name="price" required>
                        </div>

                        <div class="form-group">
                            <label for="capacity">Capacity</label>
                            <input type="number"  value="{{ $course->capacity }}" class="form-control" id="capacity" name="capacity" required>
                        </div>

                        <div class="form-group">
                            <label for="start_date">Start Date</label>
                            <input type="date"  value="{{ $course->start_date }}" class="form-control" id="start_date" name="start_date" required>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 col-form-label">Categories</label>
                            <select name="category_id" class="form-select" >
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $course->category_id == $category->id ? 'selected' : '' }}>
                                    {{$category->name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-gradient-primary btn-lg mb-4">Update Course</button>
                        <a href="{{ route('courses.index') }}" class="btn btn-secondary btn-lg mb-4 ">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

