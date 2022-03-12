<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use App\Models\Gym;
use App\Models\User;
use Illuminate\Support\Facades\File;

class CoachController extends Controller
{
    #=======================================================================================#
    #			                        list Function                                       #
    #=======================================================================================#
    public function list()
    {
        $coachesFromDB = User::role('coach')->withoutBanned()->get();
        if (count($coachesFromDB) <= 0) {
            return view('empty');
        }
        return view("coach.list", ['coaches' => $coachesFromDB]);
    }
    #=======================================================================================#
    #			                        show Function                                       #
    #=======================================================================================#
    public function show($id)
    {
        $singleCoach = User::find($id);
        return view("coach.show", ['singleCoach' => $singleCoach]);
    }

    #=======================================================================================#
    #			                        create Function                                     #
    #=======================================================================================#
    public function create()
    {
        $coaches = User::all();
        $cities = City::all();
        return view('coach.create', [
            'users' => $coaches,
            'cities' => $cities,
        ]);
    }
    #=======================================================================================#
    #			                        store Function                                      #
    #=======================================================================================#
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:2'],
            'email' => ['required'],
            'profile_image' => ['nullable', 'mimes:jpg,jpeg'],
            'city_id' => ['required'],
        ]);

        if ($request->hasFile('profile_image') == null) {
            $imageName = 'imgs/defaultImg.jpg';
        } else {
            $image = $request->file('profile_image');
            $name = time() . \Str::random(30) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/imgs');
            $image->move($destinationPath, $name);
            $imageName = 'imgs/' . $name;
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->city_id = $request->city_id;
        $user->profile_image = $imageName;
        $user->assignRole('coach');
        $user->save();
        return redirect()->route('coach.list');
    }

    #=======================================================================================#
    #			                        Edit Function                                       #
    #=======================================================================================#
    public function edit($id)
    {
        $users = User::all();
        $singleCoach = User::find($id);
        return view("coach.edit", ['coach' => $singleCoach, 'users' => $users]);
    }

    #=======================================================================================#
    #			                        Update Function                                     #
    #=======================================================================================#
    public function update(Request $request, $id)
    {

        $user = User::find($id);
        $validated = $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|string|unique:users,email,' . $user->id,
            'profile_image' => 'mimes:jpg,jpeg',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $name = time() . \Str::random(30) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/imgs');
            $image->move($destinationPath, $name);
            $imageName = 'imgs/' . $name;
            if (isset($user->profile_image))
                File::delete(public_path('imgs/' . $user->profile_image));
            $user->profile_image = $imageName;
        }
        $user->save();
        return redirect()->route('coach.list');
    }

    #=======================================================================================#
    #			                        Delete Function                                     #
    #=======================================================================================#
    public function deleteCoach($id)
    {
        $singleCoach = User::find($id);
        $singleCoach->delete();
        return response()->json(['success' => 'Record deleted successfully!']);
    }
}
