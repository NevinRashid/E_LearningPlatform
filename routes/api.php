<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ReviewController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
    Route::apiResource('courses', CourseController::class);
    Route::apiResource('courses.photos', PhotoController::class); 


Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('user', [AuthController::class, 'user'])->middleware('auth:sanctum');

Route::get('/courses', [CourseController::class, 'index']);
Route::post('/photos', [PhotoController::class, 'store']);

Route::apiResource('courses', CourseController::class);

Route::post('/courses/{courseId}/reviews', [ReviewController::class, 'store']);

Route::middleware(['role:visitor'])->group(function () {
    Route::get('/courses', 'CourseController@index')->name('courses.index');
});

Route::middleware('auth:sanctum')->post('/reviews', [ReviewController::class, 'store']);

});
