<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrainingSession;
use App\Models\Attendance;
use App\Models\User;
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

    public function remaining_training_sessions(){
        return ['total_sessions'=>Auth()->user()->total_sessions,
                'remain_session'=>Auth()->user()->remain_session];
    }
    public function attend_training_session(){

    }

}

