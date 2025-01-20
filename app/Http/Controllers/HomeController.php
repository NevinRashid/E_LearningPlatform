<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\DB; 
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Trainer;
use App\Models\Category;
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
        // جلب الكورسات المتاحة
        $availableCourses = Course::all();

        // جلب المدربين (على سبيل المثال، المستخدمين الذين لديهم دور "مدرب")
        // $trainers = DB::table('users')
        //     ->where('role', 'trainer') // افترض أن المدربين لديهم role = 'trainer'
        //     ->select('id', 'name', 'image') // اختر الأعمدة المطلوبة
        //     ->get();

        // جلب الفئات
        $categories = Category::with('courses')->get();

        // إرسال البيانات إلى الـ View
        return view('home', compact('availableCourses','categories'));
    }
}
