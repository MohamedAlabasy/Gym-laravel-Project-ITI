<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Notifications\Notification;
use App\Notifications\WelcomeEmailNotification;
class AuthController extends Controller
{
    public function signup(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|string|unique:users',
            'gender' => 'required',
            'birth_date'=> 'required',
            'profile_image'=> 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'gender' =>$request->gender,
            'birth_date' =>$request->birth_date,
            'profile_image'=>$request->profile_image
        ]);
        $user->assignRole('user');
        $user->save();

        $user->sendEmailVerificationNotification();
        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
        $user->notify(new WelcomeEmailNotification());
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'remember_me' => 'boolean',
            'device_name' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        else{
            $token=$user->createToken('$request->device_name')->plainTextToken;
            $response=[
                'user'=>$user,
                'token'=>$token,
            ];
            return response($response ,200);
        }
    }

    public function logout(Request $request){
        Auth()->user()->tokens()->delete();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

}
