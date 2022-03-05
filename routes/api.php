<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Api\SessionsController;
use App\Http\Controllers\Api\PackagesController;
use App\Models\User;
use App\Models\TrainingSession;
use App\Models\TrainingPackage;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Traning Sessions Routes
Route::get('sessions',[SessionsController::class,'index'])->middleware('auth:sanctum');
Route::get('sessions/{session}',[SessionsController::class,'show'])->middleware('auth:sanctum');

//Traning Packages Routes
Route::get('packages',[PackagesController::class,'index'])->middleware('auth:sanctum');
Route::get('packages/{package}',[PackagesController::class,'show'])->middleware('auth:sanctum');

//Api Sanctum Token
Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    return $user->createToken($request->device_name)->plainTextToken;
});
