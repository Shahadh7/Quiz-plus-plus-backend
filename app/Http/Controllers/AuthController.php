<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Client\Response;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{


    public function register(Request $request) {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
            'user_type' => 'required|numeric|min:1|max:3',
        ]);
        
        $randomSalt = \config('salt.salt');
        $saltedPassword = $randomSalt . $data['password'];

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($saltedPassword),
            'user_type' => $data['user_type']
        ]);

        $token = $user->createToken('myauthtoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response,201);

    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $user = User::where('email', $request->email)->first();

        $password = strval($request->password);
        $randomSalt = \config('salt.salt');

        $passwordNew =  $randomSalt . $password ;

        if (! $user || ! Hash::check($passwordNew, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken('myauthtoken')->plainTextToken;
 

        $response = [
            'message' => 'success',
            'token' => $token,
            'user_type' => $user->user_type,
        ];
    
        return response($response,200);
    }

    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();

        return response([
            'message' => 'Logged out'
        ]);
    }
}
