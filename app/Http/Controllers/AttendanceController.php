<?php

namespace App\Http\Controllers;
use App\Models\Gym;
use App\Models\User;
use App\Models\Attendance;
use App\Models\TrainingSession;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{

    public function listHistory()
    {
        $history_attendances=Attendance::select(DB::raw('training_sessions.name as training_session_name,gyms.name as gym_name,cities.name as gym_city,Date(attendances.attendance_at
        ) as attendance_date,Time(attendances.attendance_at) as attendance_time , users.name as name , users.email as email'))
        ->join('users', 'users.id', '=', 'attendances.user_id')->join('training_sessions', 'training_sessions.id', '=', 'attendances.training_session_id')
        ->join('gyms',"gyms.id",'=','users.gym_id')
        ->join('cities',"gyms.city_id",'=','cities.id')
        ->get();
        return view('attendance', [
            'attendances' =>$history_attendances,
        ]);
    }


}
