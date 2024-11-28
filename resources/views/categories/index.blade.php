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
<body>
    
</body>
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
<div class="container my-5">
    <div class="row">
        <div class="col">
            <a href="{{ route('categories.create') }}" class="btn btn-gradient-primary btn-lg mb-4 " >Add new category</a>
        </div>
    </div>

    <!-- عرض التصنيفات كبطاقات -->
    <div class="row g-4">
        @foreach($categories as $category)
            <div class="col-lg-3 col-md-6">
                <div class="card category-card shadow-sm">
                    <img src="{{ asset('imgs/' . $category->image) }}" class="card-img-top" alt="category image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $category->name }}</h5>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ route('categories.edit', $category) }}" class="btn btn-outline-info btn-sm">edit</a>
                            <a href="{{ route('categories.show', $category) }}" class="btn btn-outline-success btn-sm">show</a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure to delete this category?')">delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach 
    </div>
</div>

@endsection

