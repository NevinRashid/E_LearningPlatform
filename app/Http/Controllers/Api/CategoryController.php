<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Category;
use App\models\Course;
class CategoryController extends Controller
{
    public function byCategory(Request $request){
        $category=Category::where('name',$request->name)->first();
        $courses=Course::with('category')->where('category_id',$category->id)->get();
        return response()->json([$courses],200);
    }
}
