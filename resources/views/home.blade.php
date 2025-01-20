<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Platform</title>
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />
    

<style>
    /* Hero Section */
    .hero-section {
        background: linear-gradient(135deg, #da8cff, #9a55ff);
        color: white;
        padding: 100px 0;
        text-align: center;
    }

    /* Cards */
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: none;
        border-radius: 10px;
        overflow: hidden;
        background: #fff;
        margin-bottom: 20px;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }

    /* Buttons */
    .btn-custom {
        margin: 10px;
        padding: 10px 20px;
        background: linear-gradient(135deg, #da8cff, #9a55ff);
        border: none;
        color: white;
        transition: transform 0.3s ease;
        border-radius: 25px;
    }

    .btn-custom:hover {
        transform: scale(1.05);
    }

    /* Section Titles */
    .section-title {
        margin: 20px 0;
        font-size: 24px;
        font-weight: bold;
        color: #333;
    }

    /* Card Images */
    .card-img-top {
        border-radius: 10px 10px 0 0;
        height: 200px;
        object-fit: cover;
    }

    /* List Group Items */
    .list-group-item {
        transition: background-color 0.3s ease;
    }

    .list-group-item:hover {
        background-color: #f8f9fa;
    }

    /* Category Cards */
    .category-card {
        background-size: cover;
        background-position: center;
        border-radius: 10px;
        padding: 20px;
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 150px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white; /* لون النص أبيض */
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        border: 1px solid rgba(255, 255, 255, 0.2);
        position: relative;
        overflow: hidden;
    }

    .category-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.4);
        z-index: 1;
    }

    .category-card h5 {
        position: relative;
        z-index: 2;
        font-size: 1.25rem;
        font-weight: bold;
        transition: transform 0.3s ease;
        color: white; /* تغيير لون النص إلى الأبيض */
    }

    .category-card:hover {
        transform: scale(1.1);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    .category-card:hover h5 {
        transform: scale(1.1);
    }

    /* Course Cards */
    .course-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: none;
        border-radius: 15px;
        overflow: hidden;
        background: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .course-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .course-card .card-title {
        font-size: 1.5rem;
        font-weight: bold;
        color: #333;
        margin-bottom: 15px;
    }

    .course-card .card-text {
        font-size: 1rem;
        color: #666;
        margin-bottom: 20px;
    }

    /* Trainer Cards */
    .trainer-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        padding: 20px;
        border-radius: 15px;
        background: linear-gradient(135deg, #f5f7fa, #e6e6fa);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .trainer-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .trainer-image img {
        width: 150px;
        height: 150px;
        border: 5px solid #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        border-radius: 50%;
    }

    .trainer-name h5 {
        font-size: 1.25rem;
        font-weight: bold;
        color: #333;
        margin-top: 15px;
    }

    .trainer-name small {
        font-size: 0.9rem;
        color: #666;
    }
</style>
</head>
<body>
    <!-- شريط التنقل -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{route('home')}}">EDM-Learning Platform</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="btn btn-custom" href="{{ route('register') }}">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-custom" href="{{ route('login') }}">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- تعريف الموقع -->
    <section class="hero-section">
        <h1>Welcome to Our Learning Platform</h1>
        <p>Your gateway to quality education with expert trainers and diverse courses.</p>
    </section>
<!-- قائمة الكورسات -->
<section class="container my-5">
    <h2 class="section-title">Available Courses</h2>
    <div class="row">
        @foreach($availableCourses as $course)
            <div class="col-md-4 mb-4">
                <div class="card course-card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $course->title }}</h5>
                        <p class="card-text">{{ $course->description }}</p>
                        <form action="{{ route('course.register', $course->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-custom">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

<!-- قائمة المدربين -->
<section class="container my-5">
    <h2 class="section-title">Our Trainers</h2>
    <div class="row">
        @foreach($trainers as $trainer)
            <div class="col-md-3 mb-4">
                <div class="trainer-card text-center">
                    <div class="trainer-image">
                        @if($trainer->image)
                            <img src="{{ asset('storage/' . $trainer->image) }}" alt="{{ $trainer->name }}" class="img-fluid rounded-circle">
                        @else
                            <img src="https://via.placeholder.com/150" alt="Default Trainer Image" class="img-fluid rounded-circle">
                        @endif
                    </div>
                    <div class="trainer-name mt-3">
                        <h5 class="mb-0">{{ $trainer->name }}</h5>
                        <small class="text-muted">{{ $trainer->bio ?? 'Experienced Trainer' }}</small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

    <!-- قائمة الفئات -->
    <section class="container my-5">
        <h2 class="section-title">Categories</h2>
        <div class="row">
            @foreach($categories as $category)
            <div class="col-md-2 mb-3">
                <div class="category-card" style="background-image: url('{{ asset('imgs/' . $category->image) }}');">
                    <h5 class="card-title">{{ $category->name }}</h5>
                </div>
            </div>
        @endforeach
        </div>
    </section>
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
          <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2025.Focal X Academy. All rights reserved.</span>
          <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">by X6 Back-end Beg V.7 <i class="mdi mdi-heart text-danger"></i></span>
        </div>
      </footer>
    <!-- استيراد ملفات JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>