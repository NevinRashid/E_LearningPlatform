@extends('main')
@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Recent Student</h4>
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
                                    <img src="{{ asset('storage/'.$student->image) }}" class="me-2" alt="image"> {{ $student->name }}
                                </td>
                                <td> {{ $student->email }} </td>
                                <td> {{ $student->phone }} </td>
                                <td> 
                                    @foreach ($student->courses as $course)
                                        @if ($course->title===null)
                                        <p>There are no courses Registered</p>
                                        @else
                                        <li>
                                            <ul>{{ $course->title }}</ul>
                                        </li>
                                        @endif
                                    @endforeach
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