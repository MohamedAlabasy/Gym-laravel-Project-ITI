<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrainingSession;
use App\Models\Attendance;
use App\Models\User;
use Carbon\Carbon;

class SessionsController extends Controller
{
    public function index()
    {
        $sessions = TrainingSession::all();
        return $sessions;
    }
    public function showSession($sessionId)
    {
        $sessions = TrainingSession::find($sessionId);
        return [
            'name' => $sessions->name,
            'day' => $sessions->day,
            'starts_at' => $sessions->starts_at,
            'finishes_at' => $sessions->finishes_at
        ];
    }

    public function remaining_training_sessions()
    {
        return [
            'total_sessions' => Auth()->user()->total_sessions,
            'remain_session' => Auth()->user()->remain_session
        ];
    }

    public function attend_training_session($sessionId, Request $request)
    {
        $user_id = Auth()->user()->id;
        $session = TrainingSession::find($sessionId);
        $user = user::find($user_id);
        $remain_session = Auth()->user()->remain_session;
        $attendTime = Carbon::parse($request->attendance_at)->format('Y-m-d');

        if ($attendTime !== $session->day) {
            $response = ['Sorry, you can attend a session that it’s date not before today or after today'];
            return response($response, 200);
        }

        if ($remain_session >= 1) {
            $request->validate([
                'attendance_at' => 'required',
            ]);

            $attend = new Attendance([
                'attendance_at' => $request->attendance_at,
                'user_id' => $user_id,
                'training_session_id' => $sessionId
            ]);
            $attend->save();
            $remain_session--;
            $user->update(['remain_session' => $remain_session]);

            $response = [
                'user' => $user,
                'session' => $session,
            ];
            return response($response, 200);
        } else {
            $response = ['Sorry, you need to buy training sessions in order to attend'];
            return response($response, 200);
        }
    }

    public function getSessionsForUser(Request $request)
    {
        $user = Auth()->user();
        $history_attendances = Attendance::select(DB::raw('training_sessions.name as training_session_name,gyms.name as gym_name,Date(attendances.attendance_at
        ) as attendance_date,Time(attendances.attendance_at) as attendance_time'))
            ->join('users', 'users.id', '=', 'attendances.user_id')->join('training_sessions', 'training_sessions.id', '=', 'attendances.training_session_id')
            ->join('gyms', "gyms.id", '=', 'users.gym_id')
            ->where('attendances.user_id', '=', $user->id)
            ->where('users.id', '=', $user->id)

            ->get();
        return response()->json(
            $history_attendances
        );
    }
}
