<?php
namespace App\Http\Controllers;
use App\Models\CvSubmission;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function submit(Request $request)
    {
        // التحقق من صحة البيانات
        $validated = $request->validate([
            'course' => 'required|exists:courses,id',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:10240',
        ]);

        try {
            // الحصول على معرف الدورة (course_id) والملف
            $courseId = $request->input('course');
            $cv = $request->file('cv');

            // التحقق من أن الملف صالح
            if ($cv && $cv->isValid()) {
                // تخزين الملف في المجلد المناسب
                $cvPath = $cv->store('cvs', 'public');
            } else {
                return redirect()->back()->with('error', 'There was an error uploading the CV.');
            }

            // حفظ البيانات في جدول cv_submissions
            CvSubmission::create([
                'course_id' => $courseId,
                'cv_path' => $cvPath,
                'status' => 'Pending', // الحالة تكون "قيد انتظار" بشكل افتراضي
            ]);

            // إرجاع رسالة نجاح
            return redirect()->back()->with('success', 'Your application has been submitted!');
        } catch (\Exception $e) {
            // التعامل مع الخطأ في حالة حدوثه
            return redirect()->back()->with('error', 'An error occurred while submitting your application: ' . $e->getMessage());
        }
    }

    public function showForm()
    {
        // جلب الدورات المتاحة من قاعدة البيانات
        $courses = Course::all(); // أو يمكن تحديد الدورات التي تخص المعلم
        dd($courses);
        // تمرير الدورات إلى الـ view
        return view('teacher.apply', compact('courses'));
    }
}






