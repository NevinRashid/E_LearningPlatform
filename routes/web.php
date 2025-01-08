<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Student\StudentController;

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


// Route::get('/', function () {
//     return view('auth.register');
// });

Route::get('/', function () {
    return view('index');
});

Route::get('dashboard', [DashboardController::class,'getDashboardCounts'])
->name('dashboard')
->middleware('check_user_role');

Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/student', [StudentController::class, 'dashboard'])
        ->name('students.dashboard'); 
});

// Route::get('student', function () {
//     return view('student');
// })->name('student');

// Route::get('trainer', function () {
//     return view('student');
// })->name('student');

Route::get('trainer ', function () {
    return view('/student');
})->name('trainers.name');

Route::resource('categories',CategoryController::class);
Route::resource('courses', CourseController::class);
Route::resource('users', UserController::class);
Route::resource('files', FileController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
->name('home');

