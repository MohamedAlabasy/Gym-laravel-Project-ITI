<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\TrainingSession;
use App\Models\User;

class TrainingController extends Controller
{

    #=======================================================================================#
    #			                             index                                         	#
    #=======================================================================================#
    public function index()
    {
        $trainingSessions = TrainingSession::paginate(5);
        return view('gym.listSessions', [
            'trainingSessions' => $trainingSessions,
        ]);
    }
    #=======================================================================================#
    #			                             create                                        	#
    #=======================================================================================#
    public function create()
    {
        $trainingSessions = TrainingSession::all();
        $users = User::all();
        return view('gym.training_session', [
            'trainingSessions' => $trainingSessions,
            'users' => $users,
        ]);
    }
    #=======================================================================================#
    #			                             store                                         	#
    #=======================================================================================#
    public function store(Request $request)
    {
        $requestData = request()->all();
        TrainingSession::create($requestData);
        return redirect()->route('gym.listSessions');
    }
    #=======================================================================================#
    #			                             show                                         	#
    #=======================================================================================#
    public function show()
    {
        return view('');
    }
    #=======================================================================================#
    #			                             edit                                         	#
    #=======================================================================================#
    public function edit()
    {
        return view('');
    }
    #=======================================================================================#
    #			                             update                                         #
    #=======================================================================================#
    public function update()
    {
        return redirect()->route('');
    }
    #=======================================================================================#
    #			                             destroy                                       	#
    #=======================================================================================#
    public function destroy()
    {
        return redirect()->route('');
    }
}
