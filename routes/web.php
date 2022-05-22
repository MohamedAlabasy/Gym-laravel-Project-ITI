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
use App\Http\Controllers\CityController;
use App\Http\Controllers\EmptyController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\TrainingPackagesController;
use App\Http\Controllers\AttendanceController;

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
Route::get('/PaymentPackage/stripe', [StripeController::class, 'stripe'])->name('PaymentPackage.stripe')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager|gymManager|coach');
Route::post('/PaymentPackage/stripe', [StripeController::class, 'stripePost'])->name('stripe.post')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager|gymManager|coach');
Route::get('/PaymentPackage/purchase_history', [StripeController::class, 'index'])->name('PaymentPackage.purchase_history')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager|gymManager|coach');
Route::get('/', [WelcomeController::class, 'index'])->name('welcome')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager|gymManager|coach');
#=======================================================================================#
#			                        Gym Controller Routes                              	#
#=======================================================================================#
Route::controller(GymController::class)->group(function () {
    Route::get('/gym/create', 'create')->name('gym.create')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager');
    Route::post('/gym/store', 'store')->name('gym.store')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager');
    Route::get('/gym/edit/{gym}', 'edit')->name('gym.edit')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager');
    Route::put('/gym/update/{gym}', 'update')->name('gym.update')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager');
    Route::delete('/gym/{id}', 'deleteGym')->name('gym.delete')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager');
    Route::get('/gym/list', 'list')->name('gym.list')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager');
    Route::get('/gym/show/{id}', 'show')->name('gym.show')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager');
});

Route::get('/gym/training', function () {
    return view('gym.training_session')->name('gym.session');
})->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager|gymManager');

#=======================================================================================#
#			                    Coach Controller Routes                              	#
#=======================================================================================#
Route::controller(CoachController::class)->group(function () {
    Route::get('/coach/create', 'create')->name('coach.create')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager|gymManager');
    Route::post('/coach/store', 'store')->name('coach.store')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager|gymManager');
    Route::get('/coach/edit/{coach}', 'edit')->name('coach.edit')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager|gymManager');
    Route::put('/coach/update/{coach}', 'update')->name('coach.update')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager|gymManager');
    Route::delete('/coach/{id}', 'deleteCoach')->name('coach.delete')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager|gymManager');
    Route::get('/coach/list', 'list')->name('coach.list')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager|gymManager');
    Route::get('/coach/show/{coach}', 'show')->name('coach.show')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager|gymManager');
});

#=======================================================================================#
#			                          Admin Routes                                  	#
#=======================================================================================#
Route::group(['middleware' => ['auth', 'logs-out-banned-user']], function () {
    Route::get('/user/show-profile', [UserController::class, 'show_profile'])->name('user.admin_profile')->middleware('logs-out-banned-user')->middleware('role:admin');
    Route::get('/user/edit-profile', [UserController::class, 'edit_profile'])->name('user.edit_admin_profile')->middleware('logs-out-banned-user')->middleware('role:admin');
    Route::get('/gym/training_session', [TrainingController::class, 'create'])->name('gym.training_session')->middleware('logs-out-banned-user')->middleware('role:admin');
});


#=======================================================================================#
#			                         Training Routes                                  	#
#=======================================================================================#
Route::get('/TrainingSessions/index', [TrainingController::class, 'index'])->name('TrainingSessions.listSessions')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager|gymManager');
Route::get('/TrainingSessions/create_session', [TrainingController::class, 'create'])->name('TrainingSessions.training_session')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager|gymManager');
Route::post('/TrainingSessions/sessions', [TrainingController::class, 'store'])->name('TrainingSessions.store')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager|gymManager');
Route::get('/TrainingSessions/sessions/{session}', [TrainingController::class, 'show'])->name('TrainingSessions.show_training_session')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager|gymManager');
Route::get('/TrainingSessions/{session}/edit', [TrainingController::class, 'edit'])->name('TrainingSessions.edit_training_session')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager|gymManager');
Route::delete('/TrainingSessions/{session}  ', [TrainingController::class, 'deleteSession'])->name('TrainingSessions.delete_session')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager|gymManager');
Route::put('/TrainingSessions/{session}', [TrainingController::class, 'update'])->name('TrainingSessions.update_session')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager|gymManager');


#=======================================================================================#
#			                            Packages Routes                                 	#
#=======================================================================================#
Route::get('/trainingPackeges/index', [TrainingPackagesController::class, 'index'])->name('trainingPackeges.listPackeges')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager|gymManager');
Route::get('/trainingPackeges/create_package', [TrainingPackagesController::class, 'create'])->name('trainingPackeges.creatPackege')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin');
Route::post('/trainingPackeges/package', [TrainingPackagesController::class, 'store'])->name('trainingPackeges.store')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin');
Route::get('/trainingPackeges/package/{session}', [TrainingPackagesController::class, 'show'])->name('trainingPackeges.show_training_package')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin');
Route::get('/trainingPackeges/{package}/edit', [TrainingPackagesController::class, 'edit'])->name('trainingPackeges.editPackege')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin');
Route::delete('/trainingPackeges/{package}  ', [TrainingPackagesController::class, 'deletePackage'])->name('trainingPackeges.delete_package')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin');
Route::put('/trainingPackeges/{package}', [TrainingPackagesController::class, 'update'])->name('trainingPackeges.update_package')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin');
#=======================================================================================#
#			                            User Routes                                   	#
#=======================================================================================#
Route::get('/user/{id}', [UserController::class, 'show_profile'])->name('user.admin_profile')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager|gymManager');
Route::get('/user/{users}/edit-profile', [UserController::class, 'edit_profile'])->name('user.edit_admin_profile')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager|gymManager');
Route::put('/user/{users}', [UserController::class, 'update'])->name('user.update')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager|gymManager');
Route::get('/user', [UserController::class, 'index'])->name('layouts.user-layout')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager|gymManager');
#=======================================================================================#
#			                            Auth Routes                                  	#
#=======================================================================================#
Auth::routes();
#=======================================================================================#
#			                           City Managers Routes                          	#
#=======================================================================================#
Route::controller(CityManagerController::class)->group(function () {
    Route::get('/cityManager/create', 'create')->name('cityManager.create')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin');
    Route::post('/cityManager/store', 'store')->name('cityManager.store')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin');
    Route::get('/cityManager/list', 'list')->name('cityManager.list')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin');
    Route::get('/cityManager/edit/{id}', 'edit')->name('cityManager.edit')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin');
    Route::put('/cityManager/update/{id}', 'update')->name('cityManager.update')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin');
    Route::delete('/cityManager/{id}', 'deletecityManager')->name('cityManager.delete')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin');
    Route::get('/cityManager/show/{id}', 'show')->name('cityManager.show')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin');
});
#=======================================================================================#
#			                           Gym Managers Routes                          	#
#=======================================================================================#
Route::controller(GymManagerController::class)->group(function () {
    Route::get('/gymManager/create', 'create')->name('gymManager.create')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager');
    Route::post('/gymManager/store', 'store')->name('gymManager.store')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager');
    Route::get('/gymManager/list', 'list')->name('gymManager.list')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager');
    Route::get('/gymManager/edit/{gym}', 'edit')->name('gymManager.edit')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager');
    Route::put('/gymManager/update/{gym}', 'update')->name('gymManager.update')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager');
    Route::delete('/gymManager/{id}', 'deletegymManager')->name('gymManager.delete')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager');
    Route::get('/gymManager/show/{id}', 'show')->name('gymManager.show')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager');
});
#=======================================================================================#
#			                            Ban User                              	        #
#=======================================================================================#
Route::get('/banUser/{userID}', [UserController::class, 'banUser'])->name('user.banUser')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager|gymManager');
Route::get('/listBanned', [UserController::class, 'listBanned'])->name('user.listBanned')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager|gymManager');
Route::PATCH('/unBan/{userID}', [UserController::class, 'unBan'])->name('user.unBan')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager|gymManager');
// Route::get('/unBan/{userID}', [UserController::class, 'unBan'])->name('user.unBan')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager|gymManager');
#=======================================================================================#
#			                           Training Packages                              	#
#=======================================================================================#
// Route::get('/trainingPackeges/list', [UserController::class, ''])->name('')->middleware('auth')->middleware('');


#=======================================================================================#
#			                            All users Route                          	    #
#=======================================================================================#
Route::controller(AllUsersController::class)->group(function () {
    Route::get('/allUsers/list', 'list')->name('allUsers.list')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager|gymManager');
    Route::get('/allUsers/show/{id}', 'show')->name('allUsers.show')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager|gymManager');
    Route::delete('/allUsers/{id}', 'deleteUser')->name('allUsers.delete')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager|gymManager');
    Route::get('/allUsers/addGym/{id}', 'addGym')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager|gymManager');
    Route::post('/allUsers/submitGym/{id}', 'submitGym')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager|gymManager');
});


#=======================================================================================#
#			                            City route                                      #
#=======================================================================================#

//GET, 	    /photos, 	    index,  	city.index
Route::get('/cities', [CityController::class, 'list'])->name('city.list')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin');

//GET, 	/city/create, 	create, 	city.create
Route::get('/cities/create', [CityController::class, 'create'])->name('city.create')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin');
//POST, 	/city, 	store,       	city.store
Route::post('/cities', [CityController::class, 'store'])->name('city.store')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin');

//GET, 	/city/{photo}, 	show,    	city.show
Route::get('/cities/{cityID}', [CityController::class, 'show'])->name('city.show')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin');

//GET 	/city/{cityID}/edit 	edit 	city.edit
Route::get('/cities/{cityID}/edit', [CityController::class, 'edit'])->name('city.edit')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin');
//PUT/PATCH, 	/city/{cityID}, 	update, 	city.update
Route::put('/cities/{cityID}', [CityController::class, 'update'])->name('city.update')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin');

//DELETE 	/city/{cityID} 	destroy 	city.destroy
Route::delete('/cities/{cityID}', [CityController::class, 'destroy'])->name('city.destroy')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin');
Route::get('/restoredCities', [CityController::class, 'showDeleted'])->name('city.showDeleted')->middleware('auth')->middleware('role:admin');
Route::get('/restoredCities/{postID}', [CityController::class, 'restore'])->name('city.restored')->middleware('auth')->middleware('role:admin');
#=======================================================================================#
#			                           Attendance route                                  #
#=======================================================================================#
Route::get('/listHistory', [AttendanceController::class, 'listHistory'])->name('attendance')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager|gymManager');
#=======================================================================================#
#			                            empty statement                                 #
#=======================================================================================#
Route::get('/empty', [EmptyController::class, 'empty'])->name('empty.statement')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager|gymManager|coach');
#=======================================================================================#
#			                           not Found route                                  #
#=======================================================================================#
Route::get('/unAuth', [EmptyController::class, 'unAuth'])->name('500')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager|gymManager|coach');
