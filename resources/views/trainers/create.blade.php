@extends('main')
@section('content')
<div class="row">
    <form action="{{ route('trainers.store') }}" method="POST"  enctype="multipart/form-data" class="form-sample">
        @csrf
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add new trainer</h4>
                    <div class="row">
                        <div class="col-md-4">
                                <label class="col-sm-4 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control">
                                </div>
                        </div>
                        <div class="col-md-4">
                                <label class="col-sm-4 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" name="email" class="form-control">
                                </div>
                        </div>
                        <div class="col-md-4">
                                <label class="col-sm-4 col-form-label">Mobile phone</label>
                                <div class="col-sm-9">
                                    <input type="text" name="phone" class="form-control">
                                </div>
                        </div>
                        <div class="col-md-4">
                                <label class="col-sm-8 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" name="password" class="form-control">
                                </div>
                        </div>
                        <div class="col-md-4">
                            <label class="col-sm-8 col-form-label">Confirmed Password</label>
                            <div class="col-sm-9">
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="col-sm-8 col-form-label">Add image</label>
                            <div class="col-sm-9">
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="col-sm-4 col-form-label">Courses</label>
                            @foreach ($courses as $course)
                            <div class="form-group">
                                <div class="form-check">
                                    <label class="form-check-label">
                                    <input type="checkbox" name="courses_ids[]" value="{{ $course->id }}" class="form-check-input"> {{ $course->title }} <i class="input-helper"></i></label>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-gradient-primary btn-lg mb-4 " >Submit</button>
        <a href="{{ route('trainers.index') }}" class="btn btn-secondary btn-lg mb-4 ">Cancel</a>
    </form>
    
</div>
@endsection

