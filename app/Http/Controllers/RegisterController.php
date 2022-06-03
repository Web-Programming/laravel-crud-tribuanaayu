<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'email' =>'required|email',
            'password' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        return ['status' => true, 'data' => $user];
    }

    public function login(Request $request)
    {
        $validateData = $request->validate([
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        $user = User::where('email', $request->email)->first();
        if(!$user || ! Hash::check($request->password, $user->password) ){
            return response()->json(
                [
                    'status' => false, 
                    'message' => "Username atau Password and salah!"
                ],
                401
            );
        }

        $token = $user->createToken("Yagesya")->plainTextToken;
        return [
            'status' => true, 
            'token' => $token,
            'data' => $user
        ];        
    }
}
