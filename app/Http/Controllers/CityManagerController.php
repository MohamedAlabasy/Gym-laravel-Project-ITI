<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class CityManagerController extends Controller
{

    #=======================================================================================#
    #			                           Create Function                              	#
    #=======================================================================================#
    public function create()
    {
        return view('cityManager.create', [
            'users' => User::all(),
        ]);
    }
    #=======================================================================================#
    #			                           Store Function                                	#
    #=======================================================================================#
    public function store(Request $request)
    {

        $requestData = request()->all();
        User::create($requestData);
        return redirect()->route('cityManager.list');
    }

    #=======================================================================================#
    #			                           List Function                                	#
    #=======================================================================================#
    public function list()
    {
        $usersFromDB = User::all();
        $usersFromDB =  User::role('cityManager')->get();
        if (count($usersFromDB) <= 0) { //for empty statement
            return view('empty');
        }
        return view("cityManager.list", ['users' => $usersFromDB]);
    }
    #=======================================================================================#
    #			                           Show Function                                	#
    #=======================================================================================#
    public function show($id)
    {
        $singleUser = User::findorfail($id);
        return view("cityManager.show", ['singleUser' => $singleUser]);
    }
    #=======================================================================================#
    #			                           Edit Function                                	#
    #=======================================================================================#
    public function edit($id)
    {
        $users = User::all();

        $singleUser = User::find($id);

        return view("cityManager.edit", ['singleUser' => $singleUser, 'users' => $users]);
    }

    #=======================================================================================#
    #			                           Update Function                                	#
    #=======================================================================================#
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:2'],
            'email' => ['required', 'string', 'unique:App\Models\User,email'],

        ]);


        User::where('id', $id)->update([

            'name' => $request->all()['name'],
            'email' => $request->email,



        ]);
        return redirect()->route('cityManager.list');
    }

    #=======================================================================================#
    #			                           Delete Function                                	#
    #=======================================================================================#
    public function deletecityManager($id)
    {

        $singleUser = User::findorfail($id);
        $singleUser->delete();
        return response()->json(['success' => 'Record deleted successfully!']);
    }
}
