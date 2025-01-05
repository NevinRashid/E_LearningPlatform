<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;

class UserController extends Controller
{
    use HasRoles;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('check_user_role');
    }

    // عرض قائمة المستخدمين
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // عرض نموذج إنشاء مستخدم جديد
    public function create()
    {
        return view('users.create');
    }

    // تخزين مستخدم جديد
    public function store(UserRequest $request)
{
    $validatedData = $request->validated();
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        // استخدم دالة uploadImage لتخزين الصورة
        $path = UploadImage($file, "images/users");
        // أضف مسار الصورة إلى البيانات المرسلة
        $validatedData['image'] = $path;
    }
    // إنشاء مستخدم جديد مع البيانات الموثوقة بعد فحص السماحية
    if($request->user()->hasRole('admin')){
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']), // تأكد من تشفير كلمة المرور
            'image' => $validatedData['image'] , // إذا لم تكن الصورة موجودة، اجعلها null
        ]);
        $user->assignRole($request->input('role'));
        $user->courses()->attach($validatedData->input('courses_ids',[]));
        // إعادة توجيه إلى صفحة المستخدمين مع رسالة نجاح
        return redirect('/users')->with('success', 'User created successfully!');
    }
    else{
        abort(403,'you do not have permissions to add a User');
    }
}

    // عرض تفاصيل مستخدم معين
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    // عرض نموذج تعديل مستخدم معين
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // تحديث مستخدم معين
    public function update(UserRequest $request, User $user)
    {
        if($request->user()->hasRole('admin')){
            $validatedData = $request->validated();
            $user->name = $validatedData->name;
            $user->email = $validatedData->email;
            if ($request->filled('password')) {
                $user->password = Hash::make($validatedData->password);
            }
            // معالجة الصورة إذا تم رفعها
            if ($request->hasFile('image')) {
                // يمكنك حذف الصورة القديمة هنا إذا لزم الأمر
                $user->image = $request->file('image')->store('images', 'public');
            }
            $user->phone = $request->phone;
            $user->save();
            $user->courses()->sync($validatedData->input('courses_ids',[]));
            return redirect()->route('users.index')->with('success', 'User updated successfully.');
        }
        else{
            abort(403,'you do not have permissions to update a User');
        }
    }
    // حذف مستخدم معين
    public function destroy(User $user)
    {
        if(Auth::user()->hasRole('admin')){
            // يمكنك حذف الصورة هنا إذا لزم الأمر
            $user->delete();
            return redirect()->route('users.index')->with('success', 'User deleted successfully.');
        }
        else{
            abort(403,'you do not have permissions to delete a User');
        }
    }

}
