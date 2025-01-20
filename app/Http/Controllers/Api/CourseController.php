<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\User;

class CourseController extends Controller
{

    public function register(Course $course)
{
    $user_id = Auth::user()->id;
    $user = User::find($user_id);

    // التحقق من وجود المستخدم
    if (!$user) {   
        return redirect()->route('login')->with('error', 'User not found.');
    }

    // التحقق مما إذا كان المستخدم مسجلًا بالفعل في الكورس
    if ($user->courses()->where('course_id', $course->id)->exists()) {
        return redirect()->back()->with('error', 'You are already registered for this course.');
    }

    // تسجيل المستخدم في الكورس
    $user->courses()->attach($course->id);

    // إعادة توجيه المستخدم إلى الصفحة الرئيسية مع رسالة نجاح
    return redirect()->route('student.dashboard')->with('success', 'You have successfully registered for the course.');
}

public function unregister(Course $course)
{
    $user_id = Auth::user()->id;
    $user = User::find($user_id);

    // التحقق من وجود المستخدم
    if (!$user) {
        return redirect()->route('login')->with('error', 'User not found.');
    }

    // التحقق مما إذا كان المستخدم مسجلًا في الكورس
    if (!$user->courses()->where('course_id', $course->id)->exists()) {
        return redirect()->back()->with('error', 'You are not registered for this course.');
    }

    // إلغاء تسجيل المستخدم من الكورس
    $user->courses()->detach($course->id);

    // إعادة توجيه المستخدم إلى الصفحة الرئيسية مع رسالة نجاح
    return redirect()->route('student.dashboard')->with('success', 'You have successfully unregistered from the course.');
}
    // public function register(Course $course)
    // {
    //     $user_id = Auth::user()->id;
    //     $user = User::find($user_id);

    //     // التحقق من وجود المستخدم
    //     if (!$user) {   
    //         return redirect()->route('login')->with('error', 'User not found.');
    //     }

    //     // التحقق مما إذا كان المستخدم مسجلًا بالفعل في الكورس
    //     if ($user->courses()->where('course_id', $course->id)->exists()) {
    //         return redirect()->back()->with('error', 'You are already registered for this course.');
    //     }

    //     // تسجيل المستخدم في الكورس
    //     $user->courses()->attach($course->id);

    //     // إعادة توجيه المستخدم إلى الصفحة الرئيسية مع رسالة نجاح
    //     return redirect()->route('student.dashboard')->with('success', 'You have successfully registered for the course.');
    // }

    // public function unregister(Course $course)
    // {
    //     $user_id = Auth::user()->id;
    //     $user = User::find($user_id);

    //     // التحقق من وجود المستخدم
    //     if (!$user) {
    //         return redirect()->route('login')->with('error', 'User not found.');
    //     }

    //     // التحقق مما إذا كان المستخدم مسجلًا في الكورس
    //     if (!$user->courses()->where('course_id', $course->id)->exists()) {
    //         return redirect()->back()->with('error', 'You are not registered for this course.');
    //     }

    //     // إلغاء تسجيل المستخدم من الكورس
    //     $user->courses()->detach($course->id);

    //     // إعادة توجيه المستخدم إلى الصفحة الرئيسية مع رسالة نجاح
    //     return redirect()->route('student.dashboard')->with('success', 'You have successfully unregistered from the course.');
    // }
}