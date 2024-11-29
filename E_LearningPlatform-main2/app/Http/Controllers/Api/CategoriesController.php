<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    public function index(){
        $categories=Category::all();
        return response()->json($categories,200);
    }
    public function showByCategoryName(Request $request){
        $category=Category::with('courses')->where('name',$request->name)->get();        
        return response()->json([$category],200);

    }
    public function showByCategoryId(Request $request){
        $courses=Course::with('category')->where('category_id',$request->category_id)->get();
        return response()->json([$courses],200);
    }
}
