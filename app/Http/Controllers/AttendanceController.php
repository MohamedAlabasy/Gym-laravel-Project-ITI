<?php

namespace App\Http\Controllers;
use App\Models\Gym;
use App\Models\User;
use App\Models\Attendance;
use App\Models\TrainingSession;

use Illuminate\Http\Request;

class AttendanceController extends Controller
{

    public function listHistory()
    {
        return view('attendance', [
            'attendances' => Attendance::all(),
        ]);
    }


}
