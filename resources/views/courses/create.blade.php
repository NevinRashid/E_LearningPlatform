@extends('main')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Add Course</title>
</head>
<body>
  <div class="page-header">
      <h3 class="page-title">
          <span class="page-title-icon bg-gradient-primary text-white me-2">
              <i class="mdi mdi-file-multiple"></i>
          </span> Add New Course
      </h3>
  </div>

  <div class="container">
      <div class="col-12 grid-margin stretch-card">
          <div class="card">
              <div class="card-body">
                  <h4 class="card-title">Create New Course</h4>
                  <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data" class="forms-sample">
                      @csrf <!-- حماية من CSRF -->

                      <div class="form-group">
                          <label for="name">Course Name</label>
                          <input type="text" class="form-control" id="name" name="name" required>
                      </div>

                      <div class="form-group">
                          <label for="description">Description</label>
                          <textarea class="form-control" id="description" name="description" required></textarea>
                      </div>

                      <div class="form-group">
                          <label for="level">Level</label>
                          <select class="form-control" id="level" name="level" required>
                              <option value="">Select Level</option>
                              <option value="1">1 (Beginner)</option>
                              <option value="2">2 (Intermediate)</option>
                              <option value="3">3 (Advanced)</option>
                          </select>
                      </div>

                      <div class="form-group">
                          <label for="price">Price</label>
                          <input type="number" class="form-control" id="price" name="price" required>
                      </div>

                      <div class="form-group">
                          <label for="capacity">Capacity</label>
                          <input type="number" class="form-control" id="capacity" name="capacity" required>
                      </div>

                      <div class="form-group">
                          <label for="start_date">Start Date</label>
                          <input type="date" class="form-control" id="start_date" name="start_date" required>
                      </div>

                      <div class="form-group">
                          <label for="category_id">Category</label>
                          <select class="form-control" id="category_id" name="category_id" required>
                              <option value="">Select Category</option>
                              @foreach($categories as $category)
                                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                              @endforeach
                          </select>
                      </div>

                      <button type="submit" class="btn btn-primary">Add Course</button>
                      <button type="button" class="btn btn-light" onclick="window.history.back();">Cancel</button>
                  </form>
              </div>
          </div>
      </div>
  </div>
</body>
</html>
@endsection

