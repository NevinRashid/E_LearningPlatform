<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\DB; 
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function index()
     {
         // التحقق من أن المستخدم مسجل الدخول وله دور "student"
         if (Auth::check() && Auth::user()->hasRole('student')) {
             return redirect()->route('student.dashboard'); // توجيه الطالب إلى صفحة الداشبورد
         }
     
         $availableCourses = Course::all();
         $categories = Category::with('courses')->get();
         $trainers = User::whereHas('roles', function ($query) {
             $query->where('name', 'trainer'); 
         })->get();
 
         return view('home', compact('availableCourses', 'categories','trainers'));
     }
}
