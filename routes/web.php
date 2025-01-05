<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.register');
});

Route::resource('categories',CategoryController::class);

Route::get('dashboard', [DashboardController::class,'getDashboardCounts'])->name('dashboard')->middleware('check_user_role');

Route::get('student', function () {
    return view('student');
})->name('student');

Route::resource('courses', CourseController::class);
Route::resource('users', UserController::class);
<<<<<<< HEAD
Route::get('trainers', function () {
    return view('trainers.index');
})->name('trainers.name');
=======
Route::resource('files', FileController::class);

>>>>>>> bc634427f111bde8ccb8ffe1f50940d2d65cf16a


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
