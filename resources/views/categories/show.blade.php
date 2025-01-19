<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Tajawal', sans-serif;
        }
        .category-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .category-card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        .category-card img {
            height: 200px;
            object-fit: cover;
        }
        .category-card .card-body {
            background-color: #ffffff;
            padding: 20px;
            text-align: center;
        }
        .category-card .card-title {
            color: #333;
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .category-card .btn {
            border-radius: 30px;
            padding: 5px 20px;
        }
    </style>
</head>
</html>
@extends('main')
@section('content')
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-grid"></i>
        </span> Categories
    </h3>
</div>

<div class="container mt-5">
    <div class="card">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="{{ asset('imgs/' . $category->image) }}" class="card-img" alt="category image">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{$category->name}}</h5>
                    @if ($category->courses && $category->courses->count() >0)
                        <h6 class="card-text">Courses affiliated with this category:</h6>
                        <ul>
                        @foreach ($category->courses as $course)
                            <li>{{ $course->title }}</li>
                        @endforeach
                        </ul>
                    @else 
                    <p class="card-text">There are no courses for this category</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="{{ route('categories.index') }}" class="btn btn-gradient-primary btn-lg mb-4 " style="margin-top: 10px;">Back</a>
        </div>
</div>
</div>

@endsection
