<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //since we have a token now we will implement sign in later
    public function SignUp(Request $request){
        $request->validate([
            "name" => "required|string|unique:users,name",
            "password" => "required|string|confirmed",
            "email" => "required|string|email|unique:users,email"
        ]);
        $user = User::create([
            "name"=>$request->name,
            "password"=>Hash::make($request->password),
            "email"=>$request->email,
            "role_id"=>1
        ]);
        $token = $user->createToken('myapp')->plainTextToken;
        $response = [
            "user" => $user,
            "token" => $token,
        ];
        return response()->json(["user"=>$response]);
    }
}
