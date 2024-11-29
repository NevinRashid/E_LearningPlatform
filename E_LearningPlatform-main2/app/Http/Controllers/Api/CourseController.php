<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
// Show all courses
    public function index(){
        $courses=Course::all();
        return response()->json($courses,200);
    }

    //Filter courses by Categories
    public function filter_by_category($category_id){
        $courses=Course::with('Category')->where('category_id',$category_id)->get();
        return response()->json([$courses],200);
    }
}
