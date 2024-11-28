<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
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
        $path = uploadImage($file, "images/users");
        // أضف مسار الصورة إلى البيانات المرسلة
        $validatedData['image'] = $path;
    }
    // إنشاء مستخدم جديد مع البيانات الموثوقة
    $user = User::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => bcrypt($validatedData['password']), // تأكد من تشفير كلمة المرور
        'image' => $validatedData['image'] , // إذا لم تكن الصورة موجودة، اجعلها null
    ]);

    // إعادة توجيه إلى صفحة المستخدمين مع رسالة نجاح
    return redirect('/users')->with('success', 'User created successfully!');
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
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }
    // حذف مستخدم معين
    public function destroy(User $user)
    {
        // يمكنك حذف الصورة هنا إذا لزم الأمر
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
