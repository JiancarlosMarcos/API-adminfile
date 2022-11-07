<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterRequest $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password =  Hash::make($request->password);

        $user->save();

        return response()->json([
            'res' => true,
            'msj' => 'Usuario registrado exitosamente'
        ],200);

    }
    public function login(Request $request){
        $credential = $request->validate([
            'email'=> ['required', 'email'],
            'password'=> ['required']
        ]);


        if(Auth::attempt($credential)){
            $user = Auth::user();
            $token = $user->createToken('token')->plainTextToken;

            return response()->json([
                'res' => true,
                'msj' => 'Login exitoso',
                'token'=> $token
            ]);
        }
    }
    public function logout(Request $request){

        $user = new User();
        $user->tokens()->delete();
        return response()->json([
            'res' => true,
            'token' => 'Token eliminado correctamente'
        ]);

    }
}
