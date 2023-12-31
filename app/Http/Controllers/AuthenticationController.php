<?php

namespace App\Http\Controllers;

use App\Http\Resources\RegisterResources;
use App\Models\Register;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthenticationController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if(! $user || ! Hash::check($request->password, $user->password)){
            throw ValidationException::withMessages([
                'email' => ['The provided are incorrect']
            ]);
        }
        return $user->createToken('user login')->plainTextToken;
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
    }

    public function me(Request $request){
        return response()->json(Auth::user());
    }
    public function register(Request $request){
        $validated = $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        ]);
        $post = Register::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
        return new RegisterResources($post);
    }
}
