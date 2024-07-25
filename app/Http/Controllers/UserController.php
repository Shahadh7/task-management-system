<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;


class UserController extends Controller
{
    
    public function store(UserRequest $request) {

        $data = $request->validated();

        $user = User::create($data);

        return response()->json(
            [
                'message' => 'User created successfully',
                'user' => $user
            ], 200);
    }

    public function login(Request $request) {

        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $data['email'])->first();

        if(!$user || !password_verify($data['password'], $user->password)) {
            return response()->json([
                'message' => 'Invalid credentials'
            ]);
        }

        $token = $user->createToken('token')->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'user' => $user,
            'token' => $token
        ]);

    }

    public function protectedRoute(Request $request) {
        return response()->json([
            'message' => 'This is a protected route'
        ]);
    }

}