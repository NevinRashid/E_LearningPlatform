<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CourseRequest;
use App\Models\File;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('check_user_role');
    }

    public function index()
    {
        $courses = Course::all();
        if ($request->filled('name')) {
            $courses->where('name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->filled('category')) {
            $courses->where('category', $request->input('category'));
        }

        if ($request->filled('level')) {
            $courses->where('level', $request->input('level'));
        }

        if ($request->filled('price')) {
            $courses->where('price', '<=', $request->input('price'));
        }
        $courses = $courses->get();
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
        // البيانات المدخلة تكون متاحة هنا بعد التحقق منها
        $course = Course::create($request->validated());
        $course->users()->attach($request->input('users_ids',[]));
        $category=Category::where('id',$course->category_id)->first();
        $category->courses()->save($course);
        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $files=File::with('course')->where('course_id',$course->id)->get();
        return view('courses.show', compact('course','files'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {   $categories = Category::all(); // استرجاع جميع الأصناف
        $course=Course::findOrFail($course);
        $selectedCategories = Course::find($course)->categories; // استرجاع الفئات المحددة
        $selectedCategoryIds = $selectedCategories->pluck('id')->toArray(); // الحصول على معرفات الفئات المحددة
        return view('courses.show',compact('course', 'categories','selectedCategoryIds'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseRequest $request, Course $course)
    {
        // تحديث الدورة باستخدام البيانات المدخلة
        $course->update($request->validated());
        $course->users()->sync($request->validated()->input('users_ids',[]));
        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
}
