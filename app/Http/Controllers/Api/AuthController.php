<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
public function login(LoginRequest $request)

{
    $credentials = $request->validated();
    if(!Auth::attempt($credentials)){
       return response (['message=> Inserite mail o password non corrette'],status:422);
    }
    $user = Auth::user();
    $token = $user->createToken('main')->plainTextToken;

    return response(compact('user','token'));

    }


    

public function Signup(SignupRequest $request)


{
    $data= $request->validated();
    $User = User::create([
        'name' =>$data['name'],
        'email' => $data ['email'],
        'password' => bcrypt($data['password']),
    ]);
    $token= $user->crateToken('main')->plainTextToken;

    return response(compact('user','token'));

    }

    


public function Logout(Request $request)

{
    $user= $request->user();
    $user->currentAccessToken()->delete;
    return response('',status:204);//non ce nulla da tornare 
    
}
}