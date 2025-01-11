@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Student Dashboard</h1>
    <p>Welcome, {{ auth()->user()->name }}!</p>
    <ul>
        <li><a href="#">View Available Courses</a></li>
        <li><a href="#">My Enrolled Courses</a></li>
        <li><a href="#">Edit Profile</a></li>
    </ul>
</div>
@endsection
