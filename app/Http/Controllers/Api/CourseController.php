<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
// use E_LearningPlatform\app\Models\User;


class CourseController extends Controller
{

    public function register(Course $course)
    {
        $user = Auth::user();

        if ($user->courses()->where('course_id', $course->id)->exists()) {
            return response()->json(['message' => 'You are already registered for this course.'], 400);
        }

        $user->courses()->attach($course->id);

        return response()->json(['message' => 'You have successfully registered for the course.']);
    }

    public function unregister(Course $course)
    {
        $user = Auth::user();

        if (!$user->courses()->where('course_id', $course->id)->exists()) {
            return response()->json(['message' => 'You are not registered for this course.'], 400);
        }

        $user->courses()->detach($course->id);

        return response()->json(['message' => 'You have successfully unregistered from the course.']);
    }
}
