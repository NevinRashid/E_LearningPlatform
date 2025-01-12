<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrainerRequest;
use App\Http\Requests\UserRequest;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;

class TrainerController extends Controller
{
    use HasRoles;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('check_user_role');
    }

    // عرض المدربين
    public function index()
    {
        $trainers = User::role('trainer')->with('courses')->paginate(10);
        return view('trainers.index', compact('trainers'));
    }

    // عرض نموذج إنشاء مدرب جديد
    public function create()
    {
        $courses=Course::all();
        return view('trainers.create',compact('courses'));
    }

    // تخزين مدرب جديد
    public function store(TrainerRequest $request)
{
    $validatedData = $request->validated();
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        // استخدم دالة uploadImage لتخزين الصورة
        $path = UploadImage($file, "images/trainers");
        // أضف مسار الصورة إلى البيانات المرسلة
        $validatedData['image'] = $path;
    }
    // إنشاء مستخدم جديد مع البيانات الموثوقة بعد فحص السماحية
    if($request->user()->hasRole('admin')){
        $trainer = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'password' => bcrypt($validatedData['password']), // تأكد من تشفير كلمة المرور
            'image' => $validatedData['image'] , // إذا لم تكن الصورة موجودة، اجعلها null
        ]);
        $trainer->assignRole('trainer');
        $trainer->courses()->attach($request->input('courses_ids',[]));
        // إعادة توجيه إلى صفحة المستخدمين مع رسالة نجاح
        return redirect()->route('trainers.index')->with('success', 'Trainer created successfully!');
    }
    else{
        abort(403,'you do not have permissions to add a Trainer');
    }
}

    // عرض تفاصيل مستخدم معين
    public function show(User $trainer)
    {
        return view('trainers.show', compact('trainer'));
    }

    // عرض نموذج تعديل مستخدم معين
    public function edit(User $trainer)
    {
        $courses=Course::all();
        return view('trainers.edit', compact('trainer','courses'));
    }

    // تحديث مستخدم معين
/*    public function update(TrainerRequest $request, User $trainer)
    {
        if($request->user()->hasRole('admin')){
            $validatedData = $request->validated();
            $trainer->name = $validatedData['name'];
            $trainer->email = $validatedData['email'];
            if ($request->filled('password')) {
                $trainer->password = Hash::make($validatedData['password']);
            }
            // معالجة الصورة إذا تم رفعها
            if ($request->hasFile('image')) {
                // يمكنك حذف الصورة القديمة هنا إذا لزم الأمر
                $file = $request->file('image');
                $path = UploadImage($file,'images/trainers');    
                $validatedData['image'] = $path;
            }
            $trainer->image=$validatedData['image'];
            $trainer->phone = $validatedData['phone'];
            $trainer->assignRole($validatedData['role']);
            $trainer->save();
            $trainer->courses()->sync($validatedData['courses_ids']);
            return redirect()->route('trainers.index')->with('success', 'Trainer updated successfully.');
        }
        else{
            abort(403,'you do not have permissions to update a Trainer');
        }
    }

    */
//=========================================================================================================
    public function update(Request $request, User $trainer)
    {
        if($request->user()->hasRole('admin')){
            $trainer->name = $request->name;
            $trainer->email = $request->email;
            if ($request->filled('password')) {
                $trainer->password = Hash::make($request->password);
            }
            // معالجة الصورة إذا تم رفعها
            if ($request->hasFile('image')) {
                // يمكنك حذف الصورة القديمة هنا إذا لزم الأمر
                $file = $request->file('image');
                $path = UploadImage($file,'images/trainers');    
                $image= $path;
            }
            $trainer->image=$image;
            $trainer->phone = $request->phone;
            $trainer->syncRoles([]);
            $trainer->assignRole($request->role);
            $trainer->save();
            $trainer->courses()->sync($request->input('courses_ids',[]));
            return redirect()->route('trainers.index')->with('success', 'Trainer updated successfully.');
        }
        else{
            abort(403,'you do not have permissions to update a Trainer');
        }
    }
//=========================================================================================================

    // حذف مستخدم معين
    public function destroy(User $trainer)
    {   
        $user=User::findOrfail(Auth::user()->id);
        if($user->hasRole('admin')){
            // يمكنك حذف الصورة هنا إذا لزم الأمر
            $trainer->delete();
            return redirect()->route('trainers.index')->with('success', 'Trainer deleted successfully.');
        }
        else{
            abort(403,'you do not have permissions to delete a Trainer');
        }
    }

}
