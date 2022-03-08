<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrainingSession;
class SessionsController extends Controller
{
    public function index(){
        $sessions=TrainingSession::all();
        return $sessions;
    }
    public function showSession($sessionId){
        $sessions=TrainingSession::find($sessionId);
        //return $sessions;
        return ['name'=>$sessions->name,
                'day'=>$sessions->day,
                'starts_at'=>$sessions->starts_at,
                'finishes_at'=>$sessions->finishes_at];
    }

    public function attendTrainingSession($sessionId){
        $request->validate([
            'name'=>'required',
            'day'=>'required',
            'starts_at'=>'required',
            'finishes_at'=>'required',
            'training_package_id'=>'required',
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
    }
}

