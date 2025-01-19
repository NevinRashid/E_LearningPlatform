@extends('main')
@section('content')

<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Create new category</h4>
      <form action="{{ route('categories.store') }}"  method="POST" enctype="multipart/form-data" class="forms-sample">
        @csrf
        <div class="form-group">
          <label for="exampleInputName1">Name</label>
          <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Name" required>
        </div>
        <div class="form-group">
          <label>File upload</label>
          <input type="file" name="image" class="file-upload-default" required>
          <div class="input-group col-xs-12">
            <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
            <span class="input-group-append">
              <button class="file-upload-browse btn btn-gradient-primary py-3" type="button">Upload</button>
            </span>
          </div>
        </div>
        <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary btn-lg mb-4 ">Cancel</a>
      </form>
    </div>
  </div>
</div>
@endsection


