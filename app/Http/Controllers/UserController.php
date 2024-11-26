<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(RegisterRequest $request){
        try {
            //        $data = $request->only(['fullName','email','phone','password','address']);
            $data = $request->validationData();
            $user = User::create($data);
            return response()->json([
                "success"=>true,
                'data'=>[
                    "user"=>$user,
                    'token'=>$user->createToken($request->ip())->plainTextToken
                ]
            ]);
        }catch(\Exception $exception){
            return response()->json([
                'success'=> false,
                'message'=>$exception->getMessage()
            ]);
        }
    }


    public function login(LoginRequest $request){
        try {
            $data = $request->validationData();
           if(!Auth::attempt($data)){
               throw new \Exception('wrong email or password');
           }
           $user = \auth()->user();
            return response()->json([
                'success'=>true,
                'data'=>[
                    "user"=>$user,
                    'token'=>$user->createToken($request->ip())->plainTextToken
                ]
            ]);
        }catch (\Exception $exception){
            return response()->json([
               'success'=> false,
                'message'=>$exception->getMessage()
            ]);
        }
    }

    public function profile(){
        try {
            return response()->json([
                'success'=>true,
                'data'=>[
                    'user'=>\auth()->user()
                ]
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'success'=> false,
                'message'=>$exception->getMessage()
            ]);
        }
    }

    public function logout(){
        try {
//            Auth::logout();
            \auth()->user()->tokens()->delete();
            return response()->json([
                'success'=>true,
                'message'=>'logout successfully'
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'success'=> false,
                'message'=>$exception->getMessage()
            ]);
        }
    }
}
