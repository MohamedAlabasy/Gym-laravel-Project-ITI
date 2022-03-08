<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GymController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CityManagerController;
use App\Http\Controllers\GymManagerController;
use App\Http\Controllers\AllUsersController;
use App\Http\Controllers\EmptyController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\StripeController;

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
#=======================================================================================#
#			                           Home Route                               	    #
#=======================================================================================#
Route::get('stripe', [StripeController::class, 'stripe']);
Route::post('stripe', [StripeController::class, 'stripePost'])->name('stripe.post');

Route::get('/', [WelcomeController::class, 'index'])->name('welcome')->middleware('auth')->middleware('logs-out-banned-user');
#=======================================================================================#
#			                        Gym Controller Routes                              	#
#=======================================================================================#
Route::controller(GymController::class)->group(function () {

    Route::get('/gym/create', 'create')->name('gym.create')->middleware('auth');
    Route::post('/gym/store', 'store')->name('gym.store')->middleware('auth');
    Route::get('/gym/edit/{gym}', 'edit')->name('gym.edit')->middleware('auth');
    Route::put('/gym/update/{gym}', 'update')->name('gym.update')->middleware('auth');

    Route::delete('/gym/{id}', 'deleteGym')->name('gym.delete')->middleware('auth');

    Route::get('/gym/list', 'list')->name('gym.list')->middleware('auth');
    Route::get('/gym/show/{id}', 'show')->name('gym.show')->middleware('auth');
});

Route::get('/gym/training', function () {
    return view('gym.training_session')->name('gym.session');
})->middleware('auth')->middleware('logs-out-banned-user');

#=======================================================================================#
#			                    Coach Controller Routes                              	#
#=======================================================================================#
Route::controller(CoachController::class)->group(function () {
    Route::get('/coach/create', 'create')->name('coach.create')->middleware('auth');
    Route::post('/coach/store', 'store')->name('coach.store')->middleware('auth');
    Route::get('/coach/edit/{coach}', 'edit')->name('coach.edit')->middleware('auth');
    Route::put('/coach/update/{coach}', 'update')->name('coach.update')->middleware('auth');

    Route::delete('/coach/{id}', 'deleteCoach')->name('coach.delete')->middleware('auth');

    Route::get('/coach/list', 'list')->name('coach.list')->middleware('auth');
    Route::get('/coach/show/{id}', 'show')->name('coach.show')->middleware('auth');
});

#=======================================================================================#
#			                          Admin Routes                                  	#
#=======================================================================================#

Route::get('/user/show-profile', [UserController::class, 'show_profile'])->name('user.admin_profile')->middleware('auth')->middleware('logs-out-banned-user');
Route::get('/user/edit-profile', [UserController::class, 'edit_profile'])->name('user.edit_admin_profile')->middleware('auth')->middleware('logs-out-banned-user');
Route::get('/gym/training_session', [TrainingController::class, 'create'])->name('gym.training_session')->middleware('auth')->middleware('logs-out-banned-user');

#=======================================================================================#
#			                         Training Routes                                  	#
#=======================================================================================#
Route::get('/gym/sessions', [TrainingController::class, 'index'])->name('gym.listSessions')->middleware('auth')->middleware('logs-out-banned-user');
Route::get('gym/listing', [TrainingController::class, 'getSession'])->name('gym.listing')->middleware('logs-out-banned-user');
Route::get('/gym/create_session', [TrainingController::class, 'create'])->name('gym.training_session')->middleware('auth')->middleware('logs-out-banned-user');
Route::post('/gym/sessions', [TrainingController::class, 'store'])->name('gym_session.store')->middleware('auth')->middleware('logs-out-banned-user');
Route::get('/gym/sessions/{session}', [TrainingController::class, 'show'])->name('gym.show_training_session')->middleware('auth')->middleware('logs-out-banned-user');
Route::get('/gym/sessions/{session}/edit', [TrainingController::class, 'edit'])->name('gym.edit_training_session')->middleware('auth')->middleware('logs-out-banned-user');
Route::delete('/gym/sessions/{session}', [TrainingController::class, 'destroy'])->name('gym.delete_session')->middleware('auth')->middleware('logs-out-banned-user');
Route::put('/gym/sessions/{session}', [TrainingController::class, 'update'])->name('gym.update_session')->middleware('auth')->middleware('logs-out-banned-user');

#=======================================================================================#
#			                            User Routes                                   	#
#=======================================================================================#
Route::get('/user/{id}', [UserController::class, 'show_profile'])->name('user.admin_profile')->middleware('auth')->middleware('logs-out-banned-user');
Route::get('/user/{users}/edit-profile', [UserController::class, 'edit_profile'])->name('user.edit_admin_profile')->middleware('auth')->middleware('logs-out-banned-user');
Route::put('/user/{users}', [UserController::class, 'update'])->name('user.update')->middleware('auth')->middleware('logs-out-banned-user');
Route::get('/user', [UserController::class, 'index'])->name('layouts.user-layout')->middleware('auth')->middleware('logs-out-banned-user');
#=======================================================================================#
#			                            Auth Routes                                  	#
#=======================================================================================#
Auth::routes();


#=======================================================================================#
#			                           City Managers Routes                          	#
#=======================================================================================#
Route::controller(CityManagerController::class)->group(function () {
    Route::get('/cityManager/create', 'create')->name('cityManager.create')->middleware('auth')->middleware('logs-out-banned-user');
    Route::post('/cityManager/store', 'store')->name('cityManager.store')->middleware('auth')->middleware('logs-out-banned-user');
    Route::get('/cityManager/list', 'list')->name('cityManager.list')->middleware('auth')->middleware('logs-out-banned-user');
    Route::get('/cityManager/edit/{id}', 'edit')->name('cityManager.edit')->middleware('auth')->middleware('logs-out-banned-user');
    Route::put('/cityManager/update/{id}', 'update')->name('cityManager.update')->middleware('auth')->middleware('logs-out-banned-user');
    Route::delete('/cityManager/{id}', 'deletecityManager')->name('cityManager.delete')->middleware('auth')->middleware('logs-out-banned-user');
    Route::get('/cityManager/show/{id}', 'show')->name('cityManager.show')->middleware('auth')->middleware('logs-out-banned-user');
});
#=======================================================================================#
#			                           Gym Managers Routes                          	#
#=======================================================================================#
Route::controller(GymManagerController::class)->group(function () {
    Route::get('/gymManager/create', 'create')->name('gymManager.create')->middleware('auth')->middleware('logs-out-banned-user');
    Route::post('/gymManager/store', 'store')->name('gymManager.store')->middleware('auth')->middleware('logs-out-banned-user');
    Route::get('/gymManager/list', 'list')->name('gymManager.list')->middleware('auth')->middleware('logs-out-banned-user');
    Route::get('/gymManager/edit/{gym}', 'edit')->name('gymManager.edit')->middleware('auth')->middleware('logs-out-banned-user');
    Route::put('/gymManager/update/{gym}', 'update')->name('gymManager.update')->middleware('auth')->middleware('logs-out-banned-user');
    Route::delete('/gymManager/{id}', 'deletegymManager')->name('gymManager.delete')->middleware('auth')->middleware('logs-out-banned-user');
    Route::get('/gymManager/show/{id}', 'show')->name('gymManager.show')->middleware('auth')->middleware('logs-out-banned-user');
});
#=======================================================================================#
#			                            Ban User                              	        #
#=======================================================================================#
Route::get('/banUser/{userID}', [UserController::class, 'banUser'])->name('user.banUser')->middleware('auth')->middleware('logs-out-banned-user');
Route::get('/listBanned', [UserController::class, 'listBanned'])->name('user.listBanned')->middleware('auth')->middleware('logs-out-banned-user');
Route::PATCH('/unBan/{userID}', [UserController::class, 'unBan'])->name('user.unBan')->middleware('auth')->middleware('logs-out-banned-user');

#=======================================================================================#
#			                            All users Route                          	    #
#=======================================================================================#
Route::controller(AllUsersController::class)->group(function () {
    Route::get('/allUsers/list', 'list')->name('allUsers.list')->middleware('auth')->middleware('logs-out-banned-user');
    Route::get('/allUsers/show/{id}', 'show')->name('allUsers.show')->middleware('auth')->middleware('logs-out-banned-user');
    Route::delete('/allUsers/{id}', 'deletegymManager')->name('allUsers.delete')->middleware('auth')->middleware('logs-out-banned-user');
});
Route::get('/unBan/{userID}', [UserController::class, 'unBan'])->name('user.unBan')->middleware('auth')->middleware('logs-out-banned-user');


#=======================================================================================#
#			                            City route                                      #
#=======================================================================================#

//GET, 	    /photos, 	    index,  	photos.index
Route::get('/city', [CityController::class, 'index'])->name('posts.home')->middleware('auth');


//GET, 	/photos/create, 	create, 	photos.create
Route::get('/city/create', [CityController::class, 'create'])->name('posts.create')->middleware('auth');
//POST, 	/photos, 	store,       	photos.store
Route::post('/city', [CityController::class, 'store'])->name('posts.store')->middleware('auth');


//GET, 	/photos/{photo}, 	show,    	photos.show
Route::get('/city/{postID}', [CityController::class, 'show'])->name('posts.show')->middleware('auth');


//GET 	/photos/{photo}/edit 	edit 	photos.edit
Route::get('/city/{postID}/edit', [CityController::class, 'edit'])->name('posts.edit')->middleware('auth');
//PUT/PATCH, 	/photos/{photo}, 	update, 	photos.update
Route::put('/city/{postID}', [CityController::class, 'update'])->name('posts.update')->middleware('auth');


//DELETE 	/photos/{photo} 	destroy 	photos.destroy
Route::delete('/city/{postID}', [CityController::class, 'destroy'])->name('posts.destroy')->middleware('auth');

