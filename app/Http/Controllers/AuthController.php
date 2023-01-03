<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Hash;
use App\Models\User;
use Auth;

class AuthController extends Controller
{
    public function register(UserRequest $r)
    {
        $r['password'] = Hash::make($r->password);
        $user = User::create($r->all());
        $token = $user->createToken('myapptoken')->plainTextToken;
        $answer = [
            'user' => $user,
            'token' => $token
        ];
        return response()->json($answer);
    }
    public function login(Request $request){
        abort_if(!$request->email, '401', 'email is empty');
        abort_if(!$request->password, '401', 'password is empty');
        $user = User::where('email', $request->email)->first();
        if(!$user || !Hash::check($request->password, $user->password)){
            return response()->json([
                'message' => 'bad credits'
            ]);
        }
        $token = $user->createToken('myapptoken')->plainTextToken;
        $answer = [
            'user' => $user,
            'token' => $token
        ];
        return response()->json($answer);
    }
    public function logout(){
        Auth::user()->tokens()->delete();
        return response()->json([
            'message' => 'user logout'
        ]);
    }
    public function profile(){
        return response()->json(Auth::user());
    }

}
