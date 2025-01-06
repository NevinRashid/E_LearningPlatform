@extends('main') <!-- Make sure to use your layout -->

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="mt-4 text-center">Create a New Course</h2>
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

                    <form action="{{ route('courses.store') }}" method="POST">
                        @csrf <!-- CSRF Protection -->

                        <div class="form-group">
                            <label for="name">Course Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="level">Level (1: Beginner, 2: Intermediate, 3: Advanced)</label>
                            <select class="form-control" id="level" name="level" required>
                                <option value="">Select Level</option>
                                <option value="1" {{ old('level') == '1' ? 'selected' : '' }}>1: Beginner</option>
                                <option value="2" {{ old('level') == '2' ? 'selected' : '' }}>2: Intermediate</option>
                                <option value="3" {{ old('level') == '3' ? 'selected' : '' }}>3: Advanced</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="capacity">Capacity</label>
                            <input type="number" class="form-control" id="capacity" name="capacity" value="{{ old('capacity') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="start_date">Start Date</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="category_name">Category Name</label>
                            <input type="text" class="form-control" id="category_name" name="category_name" value="{{ old('category_name') }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Create Course</button>
                        <a href="{{ route('courses.index') }}" class="btn btn-secondary btn-block mt-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
