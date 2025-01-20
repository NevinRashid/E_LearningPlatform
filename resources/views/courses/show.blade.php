<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    
</body>
</html>
@extends('main')
@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-book-open-page-variant"></i>
        </span> Courses
    </h3>
</div>

<div class="container mt-5">
    <div class="container mx-auto p-4">
        <div class="flex flex-wrap -mx-4">
            <div class="w-full md:w-1/2 px-4">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-bold mb-4">Course details</h3>
                    <p><span class="font-semibold">Course name:</span> {{ $course->title }}</p>
                    <p><span class="font-semibold">Description:</span> {{ $course->description }}</p>
                    <p><span class="font-semibold">Level:</span> {{ $course->level }}</p>
                    <p><span class="font-semibold"> Category name:</span> {{ $course->category->name }}</p>
                </div>
            </div>

            <div class="w-full md:w-1/2 px-4">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-bold mb-4"> Additional information  </h3>
                    <p><span class="font-semibold">Capacity:</span> {{ $course->capacity }}</p>
                    <p><span class="font-semibold">Price:</span> {{ $course->price }}$</p>
                    <p><span class="font-semibold">Start date:</span> {{ $course->start_date }}</p>
                    <p class="font-semibold">Trainers:</p>
                    @if ($trainers->count()>0)
                    <ul>
                        @foreach ($trainers as $trainer)
                            <li>{{ $trainer->name }}</li>
                        @endforeach
                    </ul>
                    @else
                    <p>There are no trainers for the course currently</p>
                    @endif
                </div>
            </div>
        </div>


        <div class="mt-8 bg-white rounded-lg shadow-md p-6">
            <h3 class="text-xl font-bold mb-4">Registered students</h3>
            @if ($students->count()>0)
                <ul>
                    @foreach ($students as $student)
                    <li>{{ $student->name }}</li>
                    @endforeach
                </ul>
            @else
            <p>There are no students currently registered.</p>
            @endif

            <h3 class="text-xl font-bold mb-4">Average Rating:
            @if ($course->ratings->count()>0)
            {{ number_format($course->averageRating(), 1) }} / 5
            </h3>
            @else
            </h3>
            <p>There are no ratings on this course</p>
            @endif

        </div>
        <div class="row">
            <div class="col">
                <a href="{{ route('courses.index') }}" class="btn btn-gradient-primary btn-lg mb-4 " style="margin-top: 10px;">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection
