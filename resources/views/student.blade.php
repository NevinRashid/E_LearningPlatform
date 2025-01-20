<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>EDM platform</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
  </head>
  <body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center text-center error-page bg-primary">
                <div class="row flex-grow">
                    <div class="col-lg-7 mx-auto text-white">
                        <div class="row center">
                            <div class="col-lg-6 error-page-divider text-lg-left pl-lg-4">
                                <h3 class="font-weight-light">you are student please go to Api.</h3>
                            </div>
                        </div>
                        
                        <!-- Application Form for Teaching -->
                        <div class="row mt-5">
                            <div class="col-12 text-center">
                                <h3>Apply to Teach</h3>
                                <form action="{{ route('teacher.submit') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <!-- Select available courses -->
                                    <div class="form-group">
                                        <label for="course">Available Course</label>
                                        <select class="form-control" id="course" name="course">
                                            @foreach($courses as $course)
                                            <option value="{{$course->id}}"> {{$course->title}}</option>
                                            @endforeach
                                            <!-- <option value="course_1">Course 1</option>
                                            <option value="course_2">Course 2</option>
                                            <option value="course_3">Course 3</option> -->
                                            <!-- Add your available courses dynamically here -->
                                        </select>
                                    </div>

                                    <!-- Upload CV -->
                                    <div class="form-group">
                                        <label for="cv">Upload your CV</label>
                                        <input type="file" class="form-control" id="cv" name="cv" required>
                                    </div>

                                    <!-- Submit the application -->
                                    <button type="submit" class="btn btn-success">Submit Application</button>
                                </form>
                            </div>
                        </div>

                        <!-- Back to Home -->
                        <div class="row mt-5">
                            <div class="col-12 text-center mt-xl-2">
                                <a class="text-white font-weight-medium" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Back to home</a>
                                <form method="POST" id="logout-form" action="{{ route('logout') }}" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024.Focal X Academy. All rights reserved.</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">by X6 Back-end Beg V.7 <i class="mdi mdi-heart text-danger"></i></span>
            </div>
        </footer>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('assets/vendors/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/misc.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.cookie.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <!-- End custom js for this page -->
  </body>
</html>
