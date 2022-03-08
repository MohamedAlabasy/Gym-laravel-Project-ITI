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
            'profile_image' => ['required'],


        ]);
        if ($request->hasFile('profile_image'))
        {
             $file=$request->file('profile_image');
             $filename = time() .\Str::random(30).'.'.$file->getClientOriginalExtension();
             $destination = $file->getClientOriginalExtension();
             $file->move($destination,$filename);
             $file='imgs'.$filename;
             
        }
        


        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile_image = $file;
        
        $user->save();
        return redirect()->back()->with('status','picture added suceccfully');
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