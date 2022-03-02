<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GymController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(GymController::class)->group(function () {
    Route::get('/gym/create', 'create');
    Route::post('/gym/store', 'store');
    Route::get('/gym/edit/{id}', 'edit');
    Route::post('/gym/update/{id}', 'update');
    Route::get('/gym/delete/{id}', 'delete');
    Route::get('/gym/list', 'list');
    Route::get('/gym/show/{id}', 'show');
});
Route::get('/user/show-profile', [UserController::class, 'show_profile'])->name('user.admin_profile');
Route::get('/user/edit-profile', [UserController::class, 'edit_profile'])->name('user.edit_admin_profile');