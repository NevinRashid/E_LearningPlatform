<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CourseRequest;
use App\Models\File;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

class CourseController extends Controller
{
    use HasRoles;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('check_user_role');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::paginate(10);
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
        $categories= Category::all();
        return view('courses.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseRequest $request)
    {
        if($request->user()->hasRole('admin')){
            // البيانات المدخلة تكون متاحة هنا بعد التحقق منها
            $course = Course::create($request->validated());
            $course->users()->attach($request->input('users_ids',[]));
            $category=Category::where('id',$course->category_id)->first();
            $category->courses()->save($course);
            return redirect()->route('courses.index')->with('success', 'Course created successfully.');
        }
        else{
        abort(403,'you do not have permissions to add a Category');
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $students=Course::find($course->id)->users()->role('student')->get();
        $trainers=Course::find($course->id)->users()->role('trainer')->get();
        return view('courses.show', compact('course','students','trainers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {   
        $categories= Category::all();
        return view('courses.edit',compact('course','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseRequest $request, Course $course)
    {
        // تحديث الدورة باستخدام البيانات المدخلة
        $course->update($request->validated());
        //$course->users()->sync($request->validated()->input('users_ids',[]));
        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $user=User::findOrfail(Auth::user()->id);
        if($user->hasRole('admin')){
            $course->users()->detach();
            $course->delete();
            return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
        }
        else{
            abort(403,'you do not have permissions to delete a Student');
        }
    }
}
