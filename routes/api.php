<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
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

