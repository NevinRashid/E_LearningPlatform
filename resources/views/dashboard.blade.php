@extends('main')
@section('content')
<div class="page-header">
    <h3 class="page-title">
      <span class="page-title-icon bg-gradient-primary text-white me-2">
        <i class="mdi mdi-home"></i>
      </span> Dashboard Summary
    </h3>
  </div>
  <div class="row">
    <div class="col-md-4 stretch-card grid-margin">
      <div class="card bg-gradient-success card-img-holder text-white">
        <div class="card-body">
          <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
          <h3 class="font-weight-normal mb-4">Students info<i class="mdi mdi-school menu-icon mdi-24px float-end"></i>              
          </h3>
          <h4 class="font-weight-normal mb-3">Total Students: <strong  style='font-size:22px'>{{ $studentCount }}</strong></h4>
          <h4 class="font-weight-normal mb-3">Unregisterd Students: <strong  style='font-size:22px'>{{ $unregisterdStudents }}</strong></h4>
        </div>
      </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
      <div class="card bg-gradient-info card-img-holder text-white">
        <div class="card-body">
          <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
          <h3 class="font-weight-normal mb-4">Trainers info<i class="mdi mdi-account-tie menu-icon mdi-24px float-end"></i>
          </h3>
          <h4 class="font-weight-normal mb-3">Total Trainers: <strong  style='font-size:22px'>{{ $trainerCount }}</strong></h4>
        </div>
      </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
      <div class="card bg-gradient-danger card-img-holder text-white">
        <div class="card-body">
          <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
          <h3 class="font-weight-normal mb-4">Courses info<i class="mdi mdi-book-open-page-variant menu-icon mdi-24px float-end"></i>
          </h3>
          <h4 class="font-weight-normal mb-3">Total Courses: <strong style='font-size:22px'>{{ $courseCount }}</strong></h4>
          <h4 class="font-weight-normal mb-3">Completed Courses : <strong  style='font-size:22px'>{{ $courseCompleted }}</strong></h4>
        </div>
      </div>
    </div>
  </div>


@endsection