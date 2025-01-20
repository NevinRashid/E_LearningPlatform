{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
</head>
<body>
    <h1>Welcome, {{ Auth::user()->name }}!</h1>

    <div style="display: flex; justify-content: space-between;">
        <!-- قسم الكورسات المسجلة -->
        <div style="width: 45%;">
            <h2>Your Enrolled Courses</h2>
            <ul>
                @foreach($myCourses as $course)
                    <li>{{ $course->name }}</li>
                @endforeach
            </ul>
        </div>

        <!-- قسم جميع الكورسات المتاحة -->
        <div style="width: 45%;">
            <h2>Available Courses</h2>
            <ul>
                @foreach($availableCourses as $course)
                    <li>{{ $course->name }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</body>
</html> --}}
