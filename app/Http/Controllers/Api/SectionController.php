<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * عرض قائمة الأقسام التعليمية.
     */
    public function index()
    {
        $sections = Section::all(); // جلب جميع الأقسام
        return response()->json($sections); 
    }

    /**
     * تخزين قسم تعليمي جديد.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255', // عنوان القسم
            'description' => 'nullable|string', // وصف القسم
            'course_id' => 'required|exists:courses,id', // الدورة المرتبطة
        ]);

        $section = Section::create($validatedData); // إنشاء قسم جديد
        return response()->json($section, 201); // إرجاع القسم المضاف
    }

    /**
     * عرض قسم تعليمي معين.
     */
    public function show(Section $section)
    {
        return response()->json($section); // إرجاع بيانات القسم المطلوب
    }

    /**
     * تحديث قسم تعليمي.
     */
    public function update(Request $request, Section $section)
    {
        $validatedData = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'course_id' => 'sometimes|required|exists:courses,id',
        ]);

        $section->update($validatedData); // تحديث بيانات القسم
        return response()->json($section); // إرجاع القسم المحدث
    }

    /**
     * حذف قسم تعليمي.
     */
    public function destroy(Section $section)
    {
        $section->delete(); // حذف القسم
        return response()->json(['message' => 'Section deleted successfully.']); // رسالة نجاح
    }
}
