<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
class StudentController extends Controller
{
    public function register(UserRequest $request){
        $validated= $request->validated();
        $user=User::create([
            'name'=>$validated['name'],
            'email'=>$validated['email'],
            'password'=>Hash::make($validated['password']),
            'phone'=>$validated['phone'],
            'image'=>$validated['image'],
        ]);
        $user->assignRole('student');

        return response()->json(["User"=>$user],201);
    }
    public function login(Request $request){
        $request->validate([
            'email'=>'required|string|email',
            'password'=>'required|string'
        ]);
        if(!Auth::attempt($request->only('email','password'))){
            return response()->json(["message"=>"Wrong in Email or Password"],401);
        }
        $user=User::where('email',$request->email)->firstOrFail();
        $token=$user->createToken('MyApp')->plainTextToken;
        return response()->json(['User'=>$user,'token'=>$token],200);
    }
    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json(["message"=>"logged out successfully"],200);
    }
}
