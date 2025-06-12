<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->only(['nim', 'nama', 'angkatan', 'password']);
        $data['password'] = Hash::make($data['password']);

        $user = Mahasiswa::create($data);

        return response()->json([
            'status' => 'success',
            'user' => $user
        ], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['nim', 'password']);

        if (!$token = Auth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json(['token' => $token]);
    }
}