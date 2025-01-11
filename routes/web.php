<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RatingController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TrainerController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use League\CommonMark\Extension\SmartPunct\DashParser;

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

Route::get('/', action: function () {
    return view('auth.register');
});

Route::resource('categories',CategoryController::class);
Route::get('dashboard', [DashboardController::class,'getDashboardCounts'])->name('dashboard')->middleware('check_user_role');
Route::resource('courses', CourseController::class);
Route::resource('users', UserController::class);
Route::resource('files', FileController::class);

Route::resource('comments',CommentController::class);

Auth::routes();
Route::get('/home',[App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('rate/{course}',[RatingController::class, 'rate'])->name('ratings.store');

Route::resource('trainers', TrainerController::class);
Route::resource('students', StudentController::class);
Auth::routes();

Route::get('student', function () {
    return view('student');
})->name('student');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

