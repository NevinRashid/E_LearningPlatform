@extends('main')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Edit Course</title>
</head>
<body>
  <div class="container">
      <!-- Form to edit an existing course -->
      <div class="row justify-content-center mt-4">
          <div class="col-md-8">
              <h2 class="text-center">Edit Course</h2>
              <div class="card">
                  <div class="card-body">
                    <form action="{{ route('courses.update', $course->id) }}" method="post">
                        @csrf
                        @method('put')

                        <!-- Course Name -->
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input required type="text" name="name" class="form-control" value="{{ $course->title }}">
                        </div>

                        <!-- Description -->
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <input required type="text" name="description" class="form-control" value="{{ $course->description }}">
                        </div>

                        <!-- Level -->
                        <div class="form-group">
                            <label for="level">Level:</label>
                            <select name="level" class="form-control" required>
                                <option value="">Select Level</option>
                                <option value="1" {{ $course->level == 1 ? 'selected' : '' }}>1 (Beginner)</option>
                                <option value="2" {{ $course->level == 2 ? 'selected' : '' }}>2 (Intermediate)</option>
                                <option value="3" {{ $course->level == 3 ? 'selected' : '' }}>3 (Advanced)</option>
                            </select>
                        </div>

                        <!-- Price -->
                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input required type="text" name="price" class="form-control" value="{{ $course->price }}">
                        </div>

                        <!-- Capacity -->
                        <div class="form-group">
                            <label for="capacity">Capacity:</label>
                            <input required type="text" name="capacity" class="form-control" value="{{ $course->capacity }}">
                        </div>

                        <!-- Start Date -->
                        <div class="form-group">
                            <label for="start_date">Start Date:</label>
                            <input required type="date" name="start_date" class="form-control" value="{{ $course->start_date }}">
                        </div>

                        <!-- Category -->
                        <div class="form-group">
                            <label for="category_id">Category:</label>
                            <select name="category_id" class="form-control" required>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $course->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Submit Buttons -->
                        <button type="submit" class="btn btn-primary">Update Course</button>
                        <button type="button" class="btn btn-light" onclick="window.history.back();">Cancel</button>
                    </form>
                  </div>
              </div>
          </div>
      </div>
  </div>

</body>
</html>

@endsection
