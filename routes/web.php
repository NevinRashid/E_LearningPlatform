<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;


Route::middleware(['permission:course-create'])->group(function () {
    Route::get('courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::post('courses', [CourseController::class, 'store'])->name('courses.store');

    Route::get('/test-course', function () {
        return 'You have permission to create courses!';
    });
});



Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
});
Route::get('dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('courses', function () {
    return view('courses.index');
})->name('courses');

