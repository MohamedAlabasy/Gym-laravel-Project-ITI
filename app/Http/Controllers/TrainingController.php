<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\TrainingSession;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;



class TrainingController extends Controller
{

    #=======================================================================================#
    #			                             index                                         	#
    #=======================================================================================#
    public function index()
    {
        $trainingSessions = TrainingSession::all();
        if (count($trainingSessions) <= 0) { //for empty statement
            return view('empty');
        }
        return view('TrainingSessions.listSessions', ['trainingSessions' => $trainingSessions]);
    }

    // public function getSession(Request $request) {
    //     if($request->ajax()) {
    //         $data = TrainingSession::latest()->get();
    //         return DataTables::of($data)
    //         ->addIndexColumn()
    //         ->addColumn('action', function() {
    //             $actionBtn = '<div class = "text-center">
    //             <a href="#" class = "btn btn-danger">Delete</a>
    //             <a href="#" class = "btn btn-info">View</a>
    //             <a href="#" class = "btn btn-success">Update</a>
    //             </div>'
    //            ;
    //             return $actionBtn;
    //         })
    //         ->rawColumns(['action'])
    //         ->make(true);
    //     }
    // }
    #=======================================================================================#
    #			                             create                                        	#
    #=======================================================================================#
    public function create()
    {
        $trainingSessions = TrainingSession::all();

        $users = User::all();

        foreach ($users as $user) {
            if ($user->hasRole('coach')) {
                $coaches[] = $user;
            }
        }
        return view('TrainingSessions.training_session', [
            'trainingSessions' => $trainingSessions,
            'coaches' => $coaches,
        ]);
    }
    #=======================================================================================#
    #			                             store                                         	#
    #=======================================================================================#
    public function store(Request $request)
    {
        //  dd($request->id);
        // DB::table('training_session_user')->insert($request->user_id,);


        $request->validate([
            'name' => ['required', 'string', 'min:2'],
            'day' => ['required', 'date', 'after_or_equal:today'],
            'starts_at' => ['required'],
            'finishes_at' => ['required'],

        ]);



        $validate_old_seesions=TrainingSession::where('day', '=', $request->day)->where("starts_at","!=",null)->
        where("finishes_at","!=",null) ->where(function($q) use ($request){
            $q->whereRaw("starts_at = '$request->starts_at' and finishes_at ='$request->finishes_at'")
		    ->orwhereRaw("starts_at < '$request->starts_at' and finishes_at > '$request->finishes_at'")
            ->orwhereRaw("starts_at > '$request->starts_at' and starts_at < '$request->finishes_at'")
            ->orwhereRaw("finishes_at > '$request->starts_at' and finishes_at < '$request->finishes_at'")
            ->orwhereRaw("starts_at > '$request->starts_at' and finishes_at < '$request->finishes_at'");
            })->get()->toArray();


        if(count($validate_old_seesions) > 0)
            return back()->withErrors("please check your time")->withInput();
     $requestData = request()->all();
     $session = TrainingSession::create($requestData);
    //  dd($session);
    //  DB::table('student_details')->insert($data);
        $user_id = $request->input('user_id');
        $id = $session->id;
        $data = array('user_id' => $user_id, "training_session_id" => $id);
        // DB::table('student_details')->insert($data);
        DB::table('training_session_user')->insert($data);

        return redirect()->route('TrainingSessions.listSessions');
    }
    #=======================================================================================#
    #			                             show                                         	#
    #=======================================================================================#
    public function show($id)
    {

        $trainingSession = TrainingSession::findorfail($id);
        return view('TrainingSessions.show_training_session', ['trainingSession' => $trainingSession]);
    }
    #=======================================================================================#
    #			                             edit                                         	#
    #=======================================================================================#
    public function edit($id)
    {
        $trainingSessions = TrainingSession::all();

        $trainingSession = TrainingSession::find($id);

        return view('TrainingSessions.edit_training_session', ['trainingSession' => $trainingSession, 'trainingSessions' => $trainingSessions]);
    }
    #=======================================================================================#
    #			                             update                                         #
    #=======================================================================================#
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'day' => ['required', 'string'],
            'starts_at' => [
                'required'
            ],
            'finishes_at' => [
                'required'
            ],

        ]);
        $validate_old_seesions=TrainingSession::where('day', '=', $request->day)->where("starts_at","!=",null)->
        where("finishes_at","!=",null) ->where(function($q) use ($request){
            $q->whereRaw("starts_at = '$request->starts_at' and finishes_at ='$request->finishes_at'")
		    ->orwhereRaw("starts_at < '$request->starts_at' and finishes_at > '$request->finishes_at'")
            ->orwhereRaw("starts_at > '$request->starts_at' and starts_at < '$request->finishes_at'")
            ->orwhereRaw("finishes_at > '$request->starts_at' and finishes_at < '$request->finishes_at'")
            ->orwhereRaw("starts_at > '$request->starts_at' and finishes_at < '$request->finishes_at'");


        })->where('id','!=',$id)->get()->toArray();

        if(count($validate_old_seesions) > 0)
            return back()->withErrors("Time invalid")->withInput();


        TrainingSession::where('id', $id)->update([

            'name' => $request->all()['name'],
            'day' => $request->day,
            'starts_at' => $request->starts_at,
            'finishes_at' => $request->finishes_at,



        ]);
        return redirect()->route('TrainingSessions.listSessions');
    }
    #=======================================================================================#
    #			                             destroy                                       	#
    #=======================================================================================#
    public function deleteSession($id)
    {
        // $session = TrainingSession::find($cityID);

        //  if (count(DB::select("select * from training_session_user where training_session_id = $id") == 0)) {
        //     return response()->json(['success' => 0]);
        //  }
        $trainingSession = TrainingSession::findorfail($id);
        $trainingSession->delete();
        return response()->json([
            'message' => 'Data deleted successfully!'
        ]);
    }
}
