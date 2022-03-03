<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\TrainingSession;
use App\Models\User;

class TrainingController extends Controller
{
    
    public function index()
    {
        $trainingSessions = TrainingSession::paginate(5);

        return view('gym.listSessions', [
        'trainingSessions' => $trainingSessions,
    ]);
    }
    public function create()
    {
       $trainingSessions = TrainingSession::all();
       $users = User::all();
       

        return view('gym.training_session', [
            'trainingSessions' => $trainingSessions,
            'users' => $users,
        ]);
    }
    public function store(Request $request)
    {
        $requestdata = request()->all();
       
        TrainingSession::create($requestdata);

        return redirect()->route('gym.training_session');
    }

    public function show()
    {

        return view('');
    }
    public function edit()
    {
        return view('');
    }
    public function update()
    {

        return redirect()->route('');
    }

    public function destroy()
    {


        return redirect()->route('');
    }
}
