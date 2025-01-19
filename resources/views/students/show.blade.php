@extends('main')
@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Current Student</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th> Name </th>
                                <th> Email </th>
                                <th> Mobile phone </th>
                                <th> Registered courses </th>
                                <th> Created at </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    @if (file_exists('storage/'.$student->image))
                                        <img src="{{ asset('storage/'.$student->image) }}" class="me-2" alt=""> {{ $student->name}}
                                    @else
                                        <img src="{{asset('storage/images/face.webp')}}" class="me-2" alt=""> {{ $student->name}}
                                    @endif
                                </td>
                                <td> {{ $student->email }} </td>
                                <td> {{ $student->phone }} </td>
                                <td> 
                                    @if ($student->courses  && $student->courses->count()>0)
                                    @foreach ($student->courses as $course)
                                        <ul>
                                            <li>{{ $course->title }}</li>
                                        </ul>
                                    @endforeach
                                    @else
                                        <p>There are no registered courses</p>
                                    @endif
                                </td>
                                <td> {{ $student->created_at }} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
            <div class="col">
                <a href="{{ route('students.index') }}" class="btn btn-gradient-primary btn-lg mb-4 ">Back</a>
            </div>
    </div>
</div>
@endsection