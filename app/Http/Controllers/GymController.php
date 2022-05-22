<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GymRequest;
use App\Http\Requests\UpdateGymRequest;
use App\Models\Gym;
use App\Models\City;
use App\Models\User;
use Illuminate\Support\Facades\File;

class GymController extends Controller
{
    #=======================================================================================#
    #			                          List Function                                   	#
    #=======================================================================================#
    public function list()
    {
        $gymsFromDB = Gym::all();
        if (count($gymsFromDB) <= 0) { //for gym empty statement
            return view('empty');
        }
        return view("gym.list", ['gyms' => $gymsFromDB]);
    }
    #=======================================================================================#
    #			                            Show Function                                 	#
    #=======================================================================================#

    public function show($id)
    {
        $singleGym = Gym::find($id);
        return view("gym.show", ['singleGym' => $singleGym]);
    }
    #=======================================================================================#
    #			                           Create Function                              	#
    #=======================================================================================#
    public function create()
    {

        $gyms =  User::role('gymManager')->withoutBanned()->get();
        $cities = City::all();
        return view('gym.create', [
            'users' => $gyms,
            'cities' => $cities,
        ]);
    }
    #=======================================================================================#
    #			                           Store Function                                 	#
    #=======================================================================================#
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:2'],
            'cover_image' => ['nullable', 'mimes:jpg,jpeg'],
            'city_id' => ['required'],
        ]);
        if ($request->hasFile('cover_image') == null) {
            $imageName = 'imgs/defaultImg.jpg';
        } else {
            $image = $request->file('cover_image');
            $name = time() . \Str::random(30) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/imgs');
            $image->move($destinationPath, $name);
            $imageName = 'imgs/' . $name;
        }


        $requestData = request()->all();
        Gym::create([
            'name' => $requestData['name'],
            'city_id' => $requestData['city_id'],
            'cover_image' => $imageName,
        ]);
        return redirect()->route('gym.list');
    }


    #=======================================================================================#
    #			                            Edit Function                             	    #
    #=======================================================================================#
    public function edit($id)

    {
        $users = User::role('gymManager')->withoutBanned()->get();
        $cities = City::all();
        $singleGym = Gym::find($id);
        return view("gym.edit", ['gym' => $singleGym, 'users' => $users, 'cities' => $cities,]);
    }


    //Update Function
    public function update(Request $request, $id)
    {
        $gym = Gym::find($id);
        $validated = $request->validate([
            'name' => 'required|max:20',
            'city_id' => 'required',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg',
        ]);



        $gym->name = $request->name;




        if ($request->hasFile('cover_image')) {
            $image = $request->file('cover_image');
            $name = time() . \Str::random(30) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/imgs');
            $image->move($destinationPath, $name);
            $imageName = 'imgs/' . $name;
            if (isset($gym->cover_image))
                File::delete(public_path('imgs/' . $gym->cover_image));
            $gym->cover_image = $imageName;
        }
        $gym->save();
        return redirect()->route('gym.list');
    }

    //Delete Function

    public function deleteGym($id)
    {

        $singleGym = Gym::find($id);
        $singleGym->delete();
        return response()->json(['success' => 'Record deleted successfully!']);
    }
}
