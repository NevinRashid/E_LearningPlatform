<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Learning Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert2 -->
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #da8cff, #9a55ff);
            color: white;
        }
        .gradient-bg-light {
            background: linear-gradient(135deg, #f5f7fa, #e6e6fa);
        }
        .gradient-bg-success {
            background: linear-gradient(135deg, #00b09b, #96c93d);
            color: white;
        }
        .gradient-bg-danger {
            background: linear-gradient(135deg, #ff416c, #ff4b2b);
            color: white;
        }
        .gradient-bg-info {
            background: linear-gradient(135deg, #4e54c8, #8f94fb);
            color: white;
        }
        .profile-img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }
        .course-card {
            transition: transform 0.2s;
        }
        .course-card:hover {
            transform: scale(1.02);
        }
    </style>
</head>
<body class="gradient-bg-light">
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg gradient-bg shadow-sm">
            <div class="container">
                <a class="navbar-brand text-white" href={{route('home')}}>
                    <h1 class="mb-0">EDM-Learning Platform</h1>
                </a>

                <div class="d-flex align-items-center">
                    <span class="me-3 text-white">{{ Auth::user()->name }}</span>
                    @if(Auth::user()->image)
                        <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="Profile Image" class="profile-img">
                    @else
                        <img src="https://via.placeholder.com/50" alt="Default Profile Image" class="profile-img">
                    @endif
                    <form action="{{ route('logout') }}" method="POST" class="ms-3">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm gradient-bg-danger">LogOut</button>
                    </form>
                </div>
            </div>
        </nav>

        <div class="container mt-5">

            <div class="row mt-4">
                @foreach($categories as $category)
                    <div class="col-md-12 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-header gradient-bg">
                                <h3 class="card-title text-white mb-0">{{ $category->name }}</h3>
                            </div>
                            <div class="card-body">
                                <ul class="list-group">
                                    @foreach($category->courses as $course)
                                        <li class="list-group-item d-flex justify-content-between align-items-center course-card">
                                            <div>
                                                <h5 class="mb-1">{{ $course->title }}</h5>
                                                <small class="text-muted">{{ $course->description }}</small>
                                            </div>
                                            <div>
                                                @if($course->users->contains(Auth::user()))
                                                    <a href="#" class="btn btn-info btn-sm gradient-bg-info me-2">View Files</a>
                                                    <form action="{{ route('course.unregister', $course->id) }}" method="POST" class="d-inline" id="unregister-form-{{ $course->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" onclick="confirmUnregister({{ $course->id }})" class="btn btn-danger btn-sm gradient-bg-danger">Unregister</button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('course.register', $course->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success btn-sm gradient-bg-success">Register</button>
                                                    </form>
                                                @endif
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert2 -->
    <script>
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                timer: 3000, 
                showConfirmButton: false,
                position: 'center' 
            });
        @endif
    
        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '{{ session('error') }}',
                timer: 3000, 
                showConfirmButton: false,
                position: 'center' 
            });
        @endif
    </script>
    <script>
        function confirmUnregister(courseId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You will be unregistered from this course!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, unregister',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('unregister-form-' + courseId).submit();
                }
            });
        }
    </script>
</body>
</html>