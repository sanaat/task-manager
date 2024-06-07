<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return response()->json(['response' => ['status' => true, 'data' => new UserResource($user)]], JsonResponse::HTTP_CREATED);

    }

    public function login(LoginRequest $request)
    {


        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
$user['token']=$user->createToken('api-token')->plainTextToken;
        return response()->json(['response' => ['status' => true, 'data' => new UserResource($user)]], JsonResponse::HTTP_CREATED);


    }
}
