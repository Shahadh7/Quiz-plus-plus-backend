<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\RolesAndPermissionTrait;
use App\Models\RandomNumber;
use Illuminate\Http\Request;
use Illuminate\Http\Client\Response;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Nette\Utils\Random;

class AuthController extends Controller
{

    use RolesAndPermissionTrait;

    public function register(Request $request) {

        //code segment to limit frequent registration request from same the ip address
        // $ipAddressess = DB::table('users')
        // ->where('created_at', '>', 
        //     Carbon::now()->subHours(1)->toDateTimeString()
        // )->pluck('ip_address');

        // if($ipAddressess) {
        //    foreach ($ipAddressess as $key => $value) {
        //        if($value == $request->ip()) {
        //            return response([
        //                "message" => 'you are trying to create account frequently'
        //            ]);
        //        }
        //    } 
        // }

        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
            'role' => 'required|string'
        ]);
        
        $randomSalt = Random::generate(20,"a-z0-9A-Z");
        $saltedPassword = $randomSalt . $data['password'];

        // dd(['araay' => strval($randomSalt)]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($saltedPassword),
            'ip_address' => $request->ip()
        ]);

        $this->assignRolesAndPermissions($user, $data['role']);

        RandomNumber::create([
            'random' => $randomSalt,
            'user_id' => $user['id']
        ]);

        $token = $user->createToken('myauthtoken')->plainTextToken;

        $response = [
            'name' => $user->name,
            'email' => $user->email,
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
        $randomSalt = RandomNumber::where('user_id',$user->id)->first();

        $passwordNew =  $randomSalt->random . $password ;

        if (! $user || ! Hash::check($passwordNew, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken('myauthtoken')->plainTextToken;
 

        $response = [
            'message' => 'success',
            'name' => $user->name,
            'email' => $user->email,
            'token' => $token,
        ];
    
        return response($response,200);
    }

    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();

        return response([
            'message' => 'Logged out'
        ]);
    }

    public function tokenValid() {
        return response()->json(["message" => "valid"]);
    }
}
