<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RatingController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\StudentController;

// تسجيل مستخدم جديد
Route::post('/register', function (Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return response()->json(['message' => 'User registered successfully!'], 201);
});

// تسجيل الدخول
Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    $token = $user->createToken('MyApp')->plainTextToken;

    return response()->json(['token' => $token]);
});

// تسجيل الخروج
Route::post('/logout', function (Request $request) {
    $request->user()->tokens()->delete();
    return response()->json(['message' => 'Logged out successfully']);
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/courses',[CategoryController::class,'byCategory']);

Route::post('/comments', [CommentController::class, 'store'])->middleware('auth:sanctum');
Route::post('/ratings', [RatingController::class, 'store'])->middleware('auth:sanctum');

Route::post('/course/register/{course}', [CourseController::class, 'register'])
->middleware('auth') // استخدام middleware للتحقق من صحة API authentication
->name('course.register');

Route::delete('/course/unregister/{course}', [CourseController::class, 'unregister'])
->middleware('auth') // استخدام middleware للتحقق من صحة API authentication
->name('course.unregister');

Route::get('/student', [StudentController::class, 'studentDashboard'])
    ->middleware('auth') // يجب أن يكون المستخدم مسجل الدخول
    ->name('student.dashboard');

    Route::get('/course/{courseId}/files', [CourseController::class, 'getFiles'])->name('course.files');