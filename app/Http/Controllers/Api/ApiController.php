<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function register(Request $request)
    {
        $Validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
            ]
        );

        if ($Validator->fails()) {
            return response()->json(['message' => 'validator error'], 400);
        }
        $data = $request->all();
        $data['password'] = Hash::make($request->input('password'));
        $user = User::create($data);


        $response['token'] = $user->createToken('srii')->plainTextToken;
        $response['name'] = $user->name;
        return response()->json($response, 200);
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            $user = Auth::user();

            $response['token'] = $user->createToken('srii')->plainTextToken;
            $response['name'] = $user->name;
            return response()->json($response, 200);
        } else {
            return response()->json(['message' => 'invalid credentials error'], 401);
        }
    }
}
