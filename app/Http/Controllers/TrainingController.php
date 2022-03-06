<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\TrainingSession;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;


class TrainingController extends Controller
{

    #=======================================================================================#
    #			                             index                                         	#
    #=======================================================================================#
    public function index() {
        return view('gym.listSessions');
    }
    
    public function getSession(Request $request) {
        if($request->ajax()) {
            $data = TrainingSession::latest()->get();
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function() {
                $actionBtn = '<div class = "text-center">
                <a href="#" class = "btn btn-danger">Delete</a>
                <a href="#" class = "btn btn-info">View</a>
                <a href="#" class = "btn btn-success">Update</a>
                </div>'
               ;
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
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
