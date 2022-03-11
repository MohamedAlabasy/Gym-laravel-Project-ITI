<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class AllUsersController extends Controller
{
    #=======================================================================================#
    #			                           List Function                                	#
    #=======================================================================================#
    public function list()
    {
        $usersFromDB =  User::role('user')->withoutBanned()->get();
        // $usersFromDB = User::all();
        // $usersFromDB =  User::role('user')->get();
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
    // public function delete($id){
    //     $singleUser=User::findorfail($id);
    //     $singleUser->delete();
    //     return redirect()->route('gymManager.list');

    // }
    public function deleteUser($id)
    {
        $singleUser = User::findorfail($id);
        $singleUser->delete();
        return response()->json(['success' => 'Record deleted successfully!']);
    }
}
