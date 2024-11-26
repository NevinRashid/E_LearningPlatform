<?php

namespace App\Http\Controllers;

use App\Models\Course; 
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * عرض قائمة الدورات التعليمية.
     */
    public function index()
    {
        $courses = Course::all(); // جلب جميع الدورات
        return response()->json($courses); 
    }

    /**
     * تخزين دورة تعليمية جديدة.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'teacher_id' => 'required|exists:users,id', // التحقق من صحة معرف المدرس
            'duration' => 'required|integer|min:1', // مدة الدورة
        ]);

        $course = Course::create($validatedData); // إنشاء دورة جديدة
        return response()->json($course, 201); // إرجاع الدورة التي تم إنشاؤها
    }

    /**
     * عرض دورة تعليمية معينة.
     */
    public function show(Course $course)
    {
        return response()->json($course); // إرجاع بيانات الدورة المطلوبة
    }

    /**
     * تحديث دورة تعليمية.
     */
    public function update(Request $request, Course $course)
    {
        $validatedData = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'teacher_id' => 'sometimes|required|exists:users,id',
            'duration' => 'sometimes|required|integer|min:1',
        ]);

        $course->update($validatedData); // تحديث بيانات الدورة
        return response()->json($course); // إرجاع الدورة المحدثة
    }

    /**
     * حذف دورة تعليمية.
     */
    public function destroy(Course $course)
    {
        $course->delete(); // حذف الدورة
        return response()->json(['message' => 'Course deleted successfully.']); // رسالة نجاح
    }
}
