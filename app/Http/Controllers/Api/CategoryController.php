<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Category;
use App\models\Course;
class CategoryController extends Controller
{
    public function index(){
        $categories=Category::with('courses')->get();
        return response()->json([$categories],200);
    }
    
}