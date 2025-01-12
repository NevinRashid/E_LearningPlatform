@extends('main')
@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Recent Trainer</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th> Name </th>
                                <th> Email </th>
                                <th> Mobile phone </th>
                                <th> Assigned course </th>
                                <th> Created at </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/'.$trainer->image) }}" class="me-2" alt="image"> {{ $trainer->name }}
                                </td>
                                <td> {{ $trainer->email }} </td>
                                <td> {{ $trainer->phone }} </td>
                                <td> 
                                    @foreach ($trainer->courses as $course)
                                    <li>
                                        <ul>{{ $course->title }}</ul>
                                    </li>
                                    @endforeach
                                </td>
                                <td> {{ $trainer->created_at }} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
            <div class="col">
                <a href="{{ route('trainers.index') }}" class="btn btn-gradient-primary btn-lg mb-4 ">Back</a>
            </div>
    </div>
</div>
@endsection