<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\DB;
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
    public function getSessionsForUser(Request $request){
        $user=Auth()->user();
        $history_attendances=Attendance::select(DB::raw('training_sessions.name as training_session_name,gyms.name as gym_name,Date(attendances.attendance_at
        ) as attendance_date,Time(attendances.attendance_at) as attendance_time'))
        ->join('users', 'users.id', '=', 'attendances.user_id')->join('training_sessions', 'training_sessions.id', '=', 'attendances.training_session_id')
        ->join('gyms',"gyms.id",'=','users.gym_id')
        ->where('attendances.user_id','=',$user->id)
        ->where('users.id','=',$user->id)

        ->get();
        return response()->json(
           $history_attendances
        );
    }

}
// User will have endpoint to show his attendance history , and the
// json object will be array that contains (training session name , gym
// name , attendance date , attendance time