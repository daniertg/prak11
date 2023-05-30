<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\respone;
use App\Http\Resources\LoginResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class ApiAuthController extends Controller
{
    //
    public function login(LoginRequest $request)
{
    $user = User::where('username', $request->username)->first();
    if (!$user || $request->password !== $user->password) {
        return response()->json([
            'message' => 'Username atau password salah'
        ], 401);
    }
    // $token = $user->createToken('token')->plainTextToken;
    // $token = $user->createToken('token')->plainTextToken;

$token = $user->createToken('token')->plainTextToken;
return  new LoginResource([
    'message' => 'succes login',
    'user' => $user,
    'token' => $token,

    ],200);

}
public function logout(Request$request){
    $request->user()->tokens()->delete();
    return response()->noContent();
}
public function register(RegisterRequest $request){
    $user = User::create([
        'username' => $request->username,
        'name' => $request->name,
        'email'=> $request->email,
        'password'=> Hash::make($request->password)
    ]);
    $token=$user->createToken('token')->plainTextToken;

        return new LoginResource([
            'message'=> 'success login',
            'user' => $user,
            'token' =>  $token,
        ],200);
}

}
