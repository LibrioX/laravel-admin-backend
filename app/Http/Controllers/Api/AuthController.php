<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('username', $request->username)->first();


        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => false,
                'message' => "Username atau Password Salah",
            ], 401);
        }

        $token = $user->createToken('auth-token')->plainTextToken;


        return response()->json([
            'status' => true,
            'message' => "Berhasil Masuk",
            'token' => $token,
            'data' => $user
        ], 200);
    }
}
