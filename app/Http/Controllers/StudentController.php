<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;

class StudentController extends Controller
{
    use HasRoles;

    public function __construct()
    {
        $this->middleware('auth');
    }

    // عرض المدربين
    public function index()
    {
        $students = User::role('student')->paginate(10);
        return view('students.index', compact('students'));
    }

    // عرض نموذج إنشاء طالب جديد
    public function create()
    {
        $courses=Course::all();
        return view('students.create',compact('courses'));
    }

    // تخزين طالب جديد
    public function store(StudentRequest $request)
    {
    $validatedData = $request->validated();
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        // استخدم دالة uploadImage لتخزين الصورة
        $path = UploadImage($file, "images/students");
        // أضف مسار الصورة إلى البيانات المرسلة
        $validatedData['image'] = $path;
    }
    // إنشاء مستخدم جديد مع البيانات الموثوقة بعد فحص السماحية
    if($request->user()->hasRole('admin')){
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'password' => bcrypt($validatedData['password']), // تأكد من تشفير كلمة المرور
            'image' => $validatedData['image'] , // إذا لم تكن الصورة موجودة، اجعلها null
        ]);
        $user->assignRole('student');
        $user->courses()->attach($validatedData['course_ids']);

        //عند تسجيل الطالب في كورس ما ينقص من المقاعد
        foreach($user->courses as $course){
            $course->capacity= $course->capacity-1;
        }
        // إعادة توجيه إلى صفحة المستخدمين مع رسالة نجاح
        return redirect('/students')->with('success', 'Student created successfully!');
    }
    else{
        abort(403,'you do not have permissions to add a Student');
    }
}

    // عرض تفاصيل مستخدم معين
    public function show(User $student)
    {
        return view('students.show', compact('student'));
    }

    // عرض نموذج تعديل مستخدم معين
    public function edit(User $student)
    {
        $courses=Course::all();
        return view('students.edit', compact('student','courses'));
    }

    // تحديث مستخدم معين
    public function update(StudentRequest $request, User $student)
    {
        if($request->user()->hasRole('admin')){
            $validatedData = $request->validated();
            $student->name = $validatedData['name'];
            $student->email = $validatedData['email'];
            $student->phone = $validatedData['phone'];
            if ($request->filled('password')) {
                $student->password = Hash::make($validatedData['password']);
            }
            else {
                unset($validatedData['password']);
            }
            // معالجة الصورة إذا تم رفعها
            if ($request->hasFile('image')) {
                // يمكنك حذف الصورة القديمة هنا إذا لزم الأمر
                $file = $request->file('image');
                $path = UploadImage($file,'images/students');    
                $validatedData['image']= $path;
            }
            $student->image=$validatedData['image'];
            $student->syncRoles([]);
            $student->assignRole($request->role);
            $student->save();
            $student->courses()->sync($validatedData['course_ids']);
            return redirect()->route('students.index')->with('success', 'Student updated successfully.');
        }
        else{
            abort(403,'you do not have permissions to update a Student');
        }
    }
    // حذف مستخدم معين
    public function destroy(User $student)
    {
        $user=User::findOrfail(Auth::user()->id);
        if($user->hasRole('admin')){
            $student->courses()->detach();
            $student->delete();
            return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
        }
        else{
            abort(403,'you do not have permissions to delete a Student');
        }
    }

    //عرض صفحة عند انشاء الطالب حساب
    public function studentPage()
    {
        return view('student');
    }

}


