<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function login(Request $request){
        // $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required'
        // ]);
        $user = User::where('email',$request->email)->first();

        if (!$user || !Hash::check($request->password,$user->password)) {
            $response = [
                'success' => false,
                'message' => 'Utilisateur non authentifié'
            ];

            return response($response,401);
        }

        $token = $user->createToken('myToken')->plainTextToken;

        $response = [
            'success' => true,
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout(Request $request){
        $request->user()->tokens()->delete();
       return [
           'message' => 'logged out'
       ];
    }

    public function register(Request $request){

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email|email',
            'password' => 'required|string|confirmed'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password,)
        ]);


        $token = $user->createToken('appToken')->plainTextToken;

        $response = [
            'success' => true,
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

}
