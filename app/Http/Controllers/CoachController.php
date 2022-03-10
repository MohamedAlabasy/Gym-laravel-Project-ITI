<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gym;
use App\Models\User;
use Illuminate\Support\Facades\File;

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
            'profile_image' => ['required', 'mimes:jpg,jpeg'],

        ]);

        if ($request->hasFile('profile_image'))
        {
            $file=$request->file('profile_image');
            $filename = time() .\Str::random(30).'.'.$file->getClientOriginalExtension();
            $destination = public_path('/imgs');
            $file->move($destination,$filename);
            $file='imgs'.$filename;
             
        }
        


        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile_image = $file;
        
        $user->save();
        return redirect()->route('gym.list');

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

        $user=User::find($id);
        $validated = $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|string|unique:users,email,' . $user->id,
            'profile_image' => 'required|image|mimes:jpg,jpeg',
        ]);

       
        $user->name=$request->name;
        $user->email=$request->email;
    
            $file=$request->file('profile_image');
             $filename = time() .\Str::random(30).'.'.$file->getClientOriginalExtension();
             $destination = public_path('/imgs');
             $file->move($destination,$filename);
             $file='imgs'.$filename;
             
             if(isset( $user->profile_image))
             File::delete(public_path('imgs/' . $user->profile_image));
            $user->profile_image=$file;

             
            
        
        $user->save();
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