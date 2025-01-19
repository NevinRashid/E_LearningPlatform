<?php

use App\Http\Controllers\Api\FileController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\RatingController;
Route::prefix('students')->group(function () {
    Route::post('/register',[StudentController::class,'register']);
    Route::post('/login',[StudentController::class,'login']);
});
Route::middleware('auth:sanctum')->group(function(){
    Route::prefix('students')->group(function(){
        Route::get('/logout',[StudentController::class,'logout']);
        Route::get('/courses',[CourseController::class,'index']);
        Route::get('/courses/{category_id}',[CourseController::class,'byCategory']);
        Route::get('/categories',[CategoryController::class,'index']);
        Route::get('/courses/show/{id}',[CourseController::class,'show']);
        Route::get('/files/show/{id}',[FileController::class,'video']);
        Route::post('/comments/store',[CommentController::class,'store']);
        Route::post('/courses/ratings/store',[RatingController::class,'store']);
        Route::post('/courses/enroll',[CourseController::class,'register']);
        Route::post('/courses/unregister',[CourseController::class,'unregister']);
    });
});



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

