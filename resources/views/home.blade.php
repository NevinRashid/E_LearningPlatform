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
    <style>
        .hero-section {
            background: linear-gradient(135deg,#da8cff,#9a55ff);
            color: white;
            padding: 100px 0;
            text-align: center;
        }

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

        .btn-custom {
            margin: 10px;
            padding: 10px 20px;
            background: linear-gradient(135deg,#da8cff,#9a55ff
            );
            border: none;
            color: white;
            transition: transform 0.3s ease;
            border-radius: 25px;
        }

        .btn-custom:hover {
            transform: scale(1.05);
        }

        .section-title {
            margin: 20px 0;
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .card-img-top {
            border-radius: 10px 10px 0 0;
            height: 200px;
            object-fit: cover;
        }

        /* أنماط للقوائم */
        .list-group-item {
            transition: background-color 0.3s ease;
        }

        .list-group-item:hover {
            background-color: #f8f9fa;
        }

        .category-card {
    background-size: cover; /* تغطية كاملة للخلفية */
    background-position: center; /* توسيط الصورة */
    border-radius: 10px; /* زوايا مدورة */
    padding: 20px; /* تباعد داخلي */
    text-align: center; /* توسيط النص */
    transition: transform 0.3s ease, box-shadow 0.3s ease; /* تأثيرات تحويم */
    height: 150px; /* ارتفاع ثابت للبطاقة */
    display: flex;
    align-items: center; /* توسيط عمودي */
    justify-content: center; /* توسيط أفقي */
    color: white; /* لون النص أبيض */
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7); /* ظل للنص */
    border: 1px solid rgba(255, 255, 255, 0.2); /* حدود شفافة */
    position: relative; /* لتحديد موقع النص */
    overflow: hidden; /* لإخفاء أي محتوى يخرج عن البطاقة */
}

.category-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.4); /* طبقة شفافة فوق الصورة */
    z-index: 1; /* تأكد من أن الطبقة فوق الصورة */
}

.category-card h5 {
    position: relative; /* لجعل النص فوق الطبقة الشفافة */
    z-index: 2; /* تأكد من أن النص فوق الطبقة الشفافة */
    font-size: 1.25rem; /* حجم الخط */
    font-weight: bold; /* سمك الخط */
    transition: transform 0.3s ease; /* تأثيرات تحويم للنص */
}

.category-card:hover {
    transform: scale(1.1); /* تكبير البطاقة بنسبة 10% */
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3); /* ظل عند التحويم */
}

.category-card:hover h5 {
    transform: scale(1.1); /* تكبير النص بنسبة 10% */
}
    </style>
</head>
<body>
    <!-- شريط التنقل -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">E-Learning Platform</a>
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
                    <div class="card">
                        <img src="{{ asset('storage/' . $course->image) }}" class="card-img-top" alt="{{ $course->title }}">
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
            {{-- @foreach($trainers as $trainer)
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <img src="{{ asset('storage/' . $trainer->image) }}" class="card-img-top" alt="{{ $trainer->name }}">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $trainer->name }}</h5>
                            <p class="card-text">{{ $trainer->bio ?? 'Experienced Trainer' }}</p>
                        </div>
                    </div>
                </div>
            @endforeach --}}
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

    <!-- استيراد ملفات JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>