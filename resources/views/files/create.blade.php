@extends('main')
@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-file-multiple"></i>
        </span> Files
    </h3>
</div>
<div class="row">
    <form action="{{ route('files.store') }}" method="POST"  enctype="multipart/form-data" class="form-sample">
        @csrf
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add new file</h5>
                    <div class="row">
                        <div class="col-md-4">
                                <label class="col-sm-4 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control">
                                </div>
                        </div>
                        
                        <div class="col-md-4">
                            <label class="col-sm-4 col-form-label">Courses</label>
                            <select name="course"  class="form-select" >
                                @foreach($courses as $course)
                                <option value="{{$course->id}}">{{$course->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="col-sm-4 col-form-label">Add file</label>
                            <div class="form-group">
                                <input type="file" name="file" class="file-upload-default" required>
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload File">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-gradient-primary py-3" type="button">Upload</button>
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-gradient-primary btn-lg mb-4 " >Submit</button>
        <a href="{{ route('files.index') }}" class="btn btn-secondary btn-lg mb-4 ">Cancel</a>
    </form>
    
</div>
@endsection