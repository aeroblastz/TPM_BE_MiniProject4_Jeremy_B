<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApiAuthController extends Controller
{
    public function Register(Request $request)
    {
        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password
        ];
        try{
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $token = $user->createToken('authToken')->accessToken;

            return response()->json(['token' => $token], 201);
        }
        catch(Exception $error)
        {
            return response(['error'=>$error->getMessage()]);
        }

    }
    public function login(Request $request)
    {
        $data = $request->only('email', 'password');

        if (!Auth::attempt($data))
        {
            return response()->json(['error' => 'wrong detail'], 401);
        }

        $user = Auth::user();

        if (!$user instanceof \App\Models\User)
        {
            return response()->json(['error' => 'not valid user'], 401);
        }
        $token = $user->createToken('authToken')->accessToken;

        return response()->json(['token' => $token], 200);
    }
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['message' => 'Logged out successfully']);
    }
}