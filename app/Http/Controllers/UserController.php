<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $maxAttempts = 5;
    protected $decayMinutes = 5;

    public function index(){
        try {
            return response()->json([
                'user' => auth()->user()
            ], 200);
        } 
        catch(Exception $e){
            return response()->json([
                'error' => $e->getMessage()
            ], 200);
        }
    }

    public function new(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed'
        ]);


        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            'message' => 'User successfully registered'
        ], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(!auth()->attempt($credentials)){
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }

        return response()->json([
            'access_token' => $request->user()->createToken('API Token')->plainTextToken
        ], 201);
    }
}
