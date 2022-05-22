<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;



class GymManagerController extends Controller
{
    #=======================================================================================#
    #			                           Create Function                              	#
    #=======================================================================================#
    public function create()
    {
        return view('gymManager.create', [
            'users' => User::all(),
        ]);
    }
    #=======================================================================================#
    #			                           Store Function                                	#
    #=======================================================================================#
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:20',
            'password' => 'required |min:6',
            'email' => 'required|string|unique:users,email,',
            'national_id' => 'digits_between:10,17|required|numeric|unique:users',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg',
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
        $user->password = $request->password;
        $user->profile_image = $imageName;
        $user->national_id = $request->national_id;
        $user->assignRole('gymManager');
        $user->save();

        return redirect()->route('gymManager.list');
    }

    #=======================================================================================#
    #			                           List Function                                	#
    #=======================================================================================#
    public function list()
    {
        $usersFromDB =  User::role('gymManager')->withoutBanned()->get();
        if (count($usersFromDB) <= 0) { //for empty statement
            return view('empty');
        }
        return view("gymManager.list", ['users' => $usersFromDB]);
    }
    #=======================================================================================#
    #			                           Show Function                                	#
    #=======================================================================================#
    public function show($id)
    {
        $singleUser = User::findorfail($id);
        return view("gymManager.show", ['singleUser' => $singleUser]);
    }
    #=======================================================================================#
    #			                           Edit Function                                	#
    #=======================================================================================#
    public function edit($id)
    {

        $singleUser = User::find($id);
        return view("gymManager.edit", ['singleUser' => $singleUser]);
    }

    #=======================================================================================#
    #			                           Update Function                                	#
    #=======================================================================================#
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $validated = $request->validate([
            'name' => 'required|max:20',
            'password' => 'required |min:6',
            'email' => 'required|string|unique:users,email,' . $user->id,
            'national_id' => 'digits_between:10,17|numeric|unique:users,national_id,' . $user->id,
            'profile_image' => 'nullable|image|mimes:jpg,jpeg',
        ]);

        $user->name = $request->name;
        $user->password = $request->password;
        $user->email = $request->email;
        $user->national_id = $request->national_id;

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
        return redirect()->route('gymManager.list');
    }
    #=======================================================================================#
    #			                           Delete Function                                	#
    #=======================================================================================#
    public function deletegymManager($id)
    {
        $singleUser = User::findorfail($id);
        $singleUser->delete();
        return response()->json(['success' => 'Record deleted successfully!']);
    }
}
