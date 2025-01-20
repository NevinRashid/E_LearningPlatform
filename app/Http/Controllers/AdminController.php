<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;

class AdminController extends Controller
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
        $admins = User::role('admin')->paginate(10);
        return view('admins.index', compact('admins'));
    }

    // عرض نموذج إنشاء مستخدم جديد
    public function create()
    {
        return view('admins.create');
    }

    // تخزين مستخدم جديد
    public function store(UserRequest $request)
{
    $validatedData = $request->validated();
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        // استخدم دالة uploadImage لتخزين الصورة
        $path = UploadImage($file, "images/admins");
        // أضف مسار الصورة إلى البيانات المرسلة
        $validatedData['image'] = $path;
    }
    // إنشاء مستخدم جديد مع البيانات الموثوقة بعد فحص السماحية
    if($request->user()->hasRole('admin')){
        $admin = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'password' => bcrypt($validatedData['password']), // تأكد من تشفير كلمة المرور
            'image' => $validatedData['image'] , // إذا لم تكن الصورة موجودة، اجعلها null
        ]);
        $admin->assignRole('admin');
        // إعادة توجيه إلى صفحة المستخدمين مع رسالة نجاح
        return redirect('/admins')->with('success', 'User created successfully!');
    }
    else{
        abort(403,'you do not have permissions to add a User');
    }
}

    // عرض تفاصيل مستخدم معين
    public function show(User $admin)
    {
        return view('admins.show', compact('admin'));
    }

    // عرض نموذج تعديل مستخدم معين
    public function edit(User $admin)
    {
        return view('admins.edit', compact('admin'));
    }

    // تحديث مستخدم معين
    public function update(UserRequest $request, User $admin)
    {
        if($request->user()->hasRole('admin')){
            $validatedData = $request->validated();
            $admin->name = $validatedData['name'];
            $admin->email = $request->email;
            $admin->phone = $validatedData['phone'];
            if ($request->filled('password')) {
                $admin->password = Hash::make($validatedData['password']);
            }
            else {
                unset($validatedData['password']);
            }
            // معالجة الصورة إذا تم رفعها
            if ($request->hasFile('image')) {
                // يمكنك حذف الصورة القديمة هنا إذا لزم الأمر
                $file = $request->file('image');
                $path = UploadImage($file,'images/admins');    
                $validatedData['image']= $path;
            }
            $admin->image = $validatedData['image'];
            $admin->save();
            $admin->syncRoles([]);
            $admin->assignRole($request->role);
            return redirect()->route('admins.index')->with('success', 'Admin updated successfully.');
        }
            else{
                abort(403,'you do not have permissions to update a Admin');
            }
    }
    // حذف مستخدم معين
    public function destroy(User $admin)
    {
        $user=User::findOrfail(Auth::user()->id);
        if($user->hasRole('admin')){
            $admin->delete();
            return redirect()->route('admins.index')->with('success', 'Admin deleted successfully.');
        }
        else{
            abort(403,'you do not have permissions to delete a Admin');
        }
    }
}
