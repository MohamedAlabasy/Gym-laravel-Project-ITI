<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GymController;
use App\Http\Controllers\TrainingController;
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
Route::get('/gym/training', function () {
    return view('gym.training_session')->name('gym.session');
});


Route::controller(GymController::class)->group(function () {
    Route::get('/gym/create', 'create')->name('gym.create');
    Route::post('/gym/store', 'store')->name('gym.store');
    Route::get('/gym/edit/{id}', 'edit')->name('gym.edit');
    Route::post('/gym/update/{id}', 'update')->name('gym.update');
    Route::get('/gym/delete/{id}', 'delete')->name('gym.delete');
    Route::get('/gym/list', 'list')->name('gym.list');
    Route::get('/gym/show/{id}', 'show')->name('gym.show');
});
Route::get('/user/show-profile', [UserController::class, 'show_profile'])->name('user.admin_profile');
Route::get('/user/edit-profile', [UserController::class, 'edit_profile'])->name('user.edit_admin_profile');

Route::get('/gym/training_session', [TrainingController::class, 'create'])->name('gym.training_session');

