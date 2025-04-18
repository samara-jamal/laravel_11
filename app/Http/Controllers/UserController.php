<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\student;
use App\Models\teacher;
use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function Register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);
        if ($user->role === "teacher"){
            if ($request->hasFile('img')) {

                $path = $request->file('img')->store('profile_photo', 'public');
             }
            teacher::create([
                "user_id" => $user->id,
                "education_dgree" => $request->education_dgree,
                'img' => $path

            ]);
        }

        if($user->role==="student"){
            if ($request->hasFile('img')) {

                $path = $request->file('img')->store('profile_photo', 'public');
             }
            student::create([
                'Age'=>$request->Age,
                'School_Name'=>$request->School_Name ,
                'img'=>$path,
                "user_id" => $user->id,
            ]);
        }
        return response()->json($user, 201);
    }

    public function Login(LoginRequest $request)
    {
        if (!Auth::attempt($request->only('email', 'password')))
            return response()->json(
                [
                    "message" => "invalid"
                ],

                401
            );

        $user = User::where('email', $request->email)->FirstOrFail();
        $token = $user->createToken('Token')->plainTextToken;
        return response()->json([
            "message" => "loging succesfully",
            "user" => $user,
            "token" => $token
        ]);
    }


    public function Logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            "message" => "logout succesfully",

        ]);
    }
}
