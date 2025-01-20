<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\User;
use App\Models\File;
use App\Models\Rating;
// use E_LearningPlatform\app\Models\User;


class CourseController extends Controller
{

    public function index(){
        $courses =Course::with('category')->get();
        return response()->json([$courses],200);
    }

    public function byCategory($category_id){
        $courses=Course::with('category')->where('category_id',$category_id)->get();
        return response()->json([$courses],200);
    }

    public function show($id){
        $videos=File::with('course')->where('course_id',$id)
                                                ->where('type','video')
                                                ->get();
        $files=File::with('course')->where('course_id', $id)
                                                ->where('type','<>','video')
                                                ->get();
        $rating=Rating::with('course')->where('course_id',$id)->avg('rating_value');
        return response()->json(["videos"=>$videos,"files"=>$files,'Average_rate'=>$rating.'/5'],200);
    }
    
    public function register(Request $request)
    {
        if($request->user()->hasRole('student')){
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        if ($user->courses()->where('course_id', $request->course_id)->exists()) {
            return response()->json(['message' => 'You are already registered for this course.'], 400);
        }
        $user->courses()->attach($request->course_id);
        return response()->json(['message' => 'You have successfully registered for the course.'],201);
        }
        else{
            return response()->json(['message' => 'You can not register before login.'],201);
        }
    }

    public function unregister(Request $request)
    {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);

        if (!$user->courses()->where('course_id', $request->course_id)->exists()) {
            return response()->json(['message' => 'You are not registered for this course.'], 400);
        }

        $user->courses()->detach($request->course_id);

        return response()->json(['message' => 'You have successfully unregistered from the course.'],200);
    }
    
}
