<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Gym;

use App\Models\User;

class CoachController extends Controller
{
    //List Functioin
    public function list()
    {
        $coachesFromDB =  User::role('coach')->withoutBanned()->get();
        if (count($coachesFromDB) <= 0) { //for empty statement
            return view('empty');
        }
        return view("coach.list", ['coaches' => $coachesFromDB]);
    }


    //Show Function
    public function show($id)
    {

        $singleCoach = User::find($id);

        return view("coach.show", ['singleCoach' => $singleCoach]);
    }

    //Create Function
    public function create()
    {

        return view('coach.create', [
            'users' => User::all(),
        ]);
    }

    //Store Function
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'min:2'],
            'email' => ['required'],


        ]);



        User::create($request->all());


        return redirect()->route('coach.list');
    }

    //Edit Function
    public function edit($id)
    {
        $users = User::all();

        $singleCoach = User::find($id);


        return view("coach.edit", ['coach' => $singleCoach, 'users' => $users]);
    }

    //Update Function
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:2'],

        ]);


        User::where('id', $id)->update([

            'name' => $request->all()['name'],
            'email' => $request->email,



        ]);
        return redirect()->route('coach.list');
    }

    // Delete Function

    public function deleteCoach($id)
    {

        $singleCoach = User::find($id);
        $singleCoach->delete();
        return response()->json(['success' => 'Record deleted successfully!']);
    }
}
