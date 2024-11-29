<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\CourseController;
use App\Models\Category;
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
});

Route::get('/categories',[CategoriesController::class,'index']);//list all categories name
Route::get('/courses',[CourseController::class,'index']);//list all courses 
Route::get('/filterCourse/{category_id}',[CourseController::class,'filter_by_category']);//list courses that belongs to category that you pass its id in the route
/*output example
write in postman the link:http://localhost:8000/filterCourses/2 in a new (get) request 
2:is the number of Programming category
output:(the courses belongs to Programming Category)
[
    [
        {
            "id": 3,
            "title": "first aids",
            "description": "none",
            "level": "beginner",
            "price": "30.00",
            "capacity": 20,
            "start_date": "2024-11-01",
            "category_id": 8,
            "created_at": "2024-11-29T00:00:00.000000Z",
            "updated_at": "2024-11-29T00:00:00.000000Z",
            "category": {
                "id": 8,
                "name": "Medical Science",
                "image": null,
                "created_at": "2024-11-29T08:18:22.000000Z",
                "updated_at": "2024-11-29T08:18:22.000000Z"
            }
        }
    ]
]
*/