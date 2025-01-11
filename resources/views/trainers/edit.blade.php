@extends('main')
@section('content')
<div class="row">
    <form action="{{ route('trainers.update',$trainer) }}" method="POST"  enctype="multipart/form-data" class="form-sample">
        @csrf
        @method('PUT')
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update trainer information</h4>
                    <div class="row">
                        <div class="col-md-4">
                                <label class="col-sm-4 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" value="{{ $trainer->name }}">
                                </div>
                        </div>
                        <div class="col-md-4">
                                <label class="col-sm-4 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" name="email" class="form-control" value="{{ $trainer->email }}">
                                </div>
                        </div>
                        <div class="col-md-4">
                                <label class="col-sm-4 col-form-label">Mobile phone</label>
                                <div class="col-sm-9">
                                    <input type="text" name="phone" class="form-control" value="{{ $trainer->phone }}">
                                </div>
                        </div>
                        <div class="col-md-4">
                                <label class="col-sm-8 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" name="password" class="form-control" value="{{ $trainer->password }}">
                                </div>
                        </div>
                        <div class="col-md-4">
                            <label class="col-sm-8 col-form-label">Confirmed Password</label>
                            <div class="col-sm-9">
                                <input type="password" name="password_confirmation" class="form-control" value="{{ $trainer->password }}">
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
                            <label class="col-sm-8 col-form-label">Role</label>
                            <select name="role" class="form-select" aria-haspopup="true" aria-expanded="false">
                                <option value="admin">Admin</option>
                                <option value="trainer" selected>tariner</option>
                                <option value="student">student</option>
                            </select>
                        </div>

                        <div class="col-md-8">
                            <label class="col-sm-4 col-form-label">Courses</label>
                            @foreach ($courses as $course)
                            <div class="form-group">
                                <div class="col-sm-4 form-check">
                                    <label class="form-check-label">
                                    <input type="checkbox" name="courses_ids[]" value="{{ $course->id }}" class="col-sm-8 form-check-input" {{ in_array($course->id,$trainer->courses->pluck('id')->toArray()) ? 'checked' : '' }}> {{ $course->title }} <i class="input-helper"></i></label>
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
