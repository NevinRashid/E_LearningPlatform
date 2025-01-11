<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //جلب عدد الطلاب وعدد المدربين الكلي
    public function getDashboardCounts()
    {
        $studentCount=User::role('student')->count();
        $trainerCount=User::role('trainer')->count();
        $courseCount=Course::count();
        return view('dashboard',compact('studentCount','trainerCount','courseCount'));
    }   
}
