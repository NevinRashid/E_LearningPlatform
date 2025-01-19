<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('check_user_role');
    }
    public function getDashboardCounts()
    {
        // get the total number of students and trainers
        $studentCount=User::role('student')->count();
        $trainerCount=User::role('trainer')->count();
        
        //get the total number of courses and completed courses
        $unregisterdStudents=User::role('student')->whereDoesntHave('courses')->count();
        $courseCount=Course::count();
        $courseCompleted=Course::where('capacity', 0)->count();

        return view('dashboard',compact('studentCount','trainerCount','unregisterdStudents','courseCount','courseCompleted'));
    }   
    public function aboutUs(){
        return view('about_us');
    }
}
