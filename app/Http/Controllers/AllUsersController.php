<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Gym;

class AllUsersController extends Controller
{
    #=======================================================================================#
    #			                           List Function                                	#
    #=======================================================================================#
    public function list()
    {
        $usersFromDB =  User::role('user')->withoutBanned()->get();
        if (count($usersFromDB) <= 0) { //for empty statement
            return view('empty');
        }
        return view("allUsers.list", ['users' => $usersFromDB]);
    }

    #=======================================================================================#
    #			                           Show Function                                	#
    #=======================================================================================#
    public function show($id)
    {
        $singleUser = User::findorfail($id);
        return view("allUsers.show", ['singleUser' => $singleUser]);
    }
    #=======================================================================================#
    #			                           Delete Function                                	#
    #=======================================================================================#
    public function deleteUser($id)
    {
        $singleUser = User::findorfail($id);
        $singleUser->delete();
        return response()->json(['success' => 'Record deleted successfully!']);
    }


    #=======================================================================================#
    #			                        Assign Gym To User                              	#
    #=======================================================================================#
    public function addGym($id)
    {
        $singleUser = User::findorfail($id);
        return view('allUsers.addGym', [
            'user' => User::find($id),
            'gyms' => Gym::all(),
        ]);
    }

    public function submitGym(Request $request, $user_id)
    {
        $user = User::find($user_id);
        $request->validate([
            'gym_id' => 'required',
        ]);
        $user->gym_id = $request->gym_id;
        $user->update(['gym_id' => $request->gym_id]);
        $usersFromDB =  User::role('user')->withoutBanned()->get();
        return view("allUsers.list", ['users' => $usersFromDB]);
    }
}
