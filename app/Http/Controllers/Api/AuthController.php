<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Notifications\Notification;
use App\Notifications\WelcomeEmailNotification;

class AuthController extends Controller
{
    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'gender' => 'required',
            'birth_date' => 'required',
            'profile_image' => 'required|image|mimes:jpg,jpeg',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password'
        ]);
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $name = time() . \Str::random(30) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/imgs');
            $image->move($destinationPath, $name);
            $imageName = 'imgs/' . $name;
        }
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'gender' => $request->gender,
            'birth_date' => $request->birth_date,
            'profile_image' => $imageName
        ]);
        $user->assignRole('user');
        $user->save();

        $user->sendEmailVerificationNotification();
        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
        $user->notify(new WelcomeEmailNotification());
    }

    public function signin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        } else {
            $token = $user->createToken($request->device_name)->plainTextToken;
            $response = [
                'user' => $user,
                'token' => $token,
            ];
            return response($response, 200);
        }
    }

    public function logout(Request $request)
    {
        Auth()->user()->tokens()->delete();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
    public function updateProfile(Request $request)
    {
        $user = Auth()->user();
        //get user id

        $request->validate([
            'name' => 'nullable',
            'email' => 'nullable|string|unique:users,email,' . $user->id,
            'gender' => 'nullable',
            'birth_date' => 'nullable',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg',
            'password' => 'nullable|min:6',
        ]);
        if ($request->hasFile('profile_image')) {
            if ($request->hasFile('profile_image')) {
                $image = $request->file('profile_image');
                $name = time() . \Str::random(30) . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/imgs');
                $image->move($destinationPath, $name);
                $imageName = 'imgs/' . $name;
                if ($user->profile_image)
                    File::delete(public_path('imgs/' . $user->profile_image));
                $user->profile_image = $imageName;

                $image = $request->file('profile_image');
                $name = time() . \Str::random(30) . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/imgs');
                $image->move($destinationPath, $name);
                $imageName = 'imgs/' . $name;
                if ($user->profile_image)
                    File::delete(public_path('imgs/' . $user->profile_image));
                $user->profile_image = $imageName;
            }
            $user->name = $request->name ? $request->name : $user->name;
            $user->email = $request->email ? $request->email : $user->email;
            $user->gender = $request->gender ? $request->gender : $user->gender;
            $user->birth_date = $request->birth_date ? $request->birth_date : $user->birth_date;
            $user->password = $request->password ? $request->bcrypt($request->password) : $user->password;
            $user->profile_image = $request->profile_image;
            $user->save();
            return response()->json([
                'message' => 'Successfully update'
            ]);
        }
    }
}
