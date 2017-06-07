<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserSigninRequest;
use App\Http\Requests\UserSignupRequest;
use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class ApiUserController extends Controller
{


    public function signup(UserSignupRequest $request)
    {
        $user = new User([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => bcrypt($request->get('password'))
            ]);
        $user->save();

        return response()->json([
                'message' => "Successfully created user!",
                'token' => JWTAuth::attempt($request->only('email', 'password'))
            ], 201);
    }

    public function signin(UserSigninRequest $request)
    {
        $credentials = $request->only('email', 'password');
        try {

            if(!$token = JWTAuth::attempt($credentials))
            {
                return response()->json([
                    'error' => "Invalid Credentials!"
                ], 422);
            }

        } catch (JWTException $e) {
            return response()->json([
                    'error' => "Token Error!"
                ], 422);
        }

        return response()->json([
                'token' => $token
            ], 201);
    }
}
