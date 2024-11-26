<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Course;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    
    public function store(Request $request, Course $course)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|max:10240', // التحقق من أن الملف هو صورة
        ]);

        $path = $request->file('image')->store('photos', 'public'); // تخزين الصورة في التخزين العام

        $photo = $course->photos()->create([
            'path' => $path, // حفظ المسار في قاعدة البيانات
        ]);

        return response()->json($photo, 201); // إرجاع الصورة التي تم إضافتها
    }
}

