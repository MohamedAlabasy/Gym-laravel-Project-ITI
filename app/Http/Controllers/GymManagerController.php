<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;



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
            'name' => 'required|unique:users|max:20',
            'password' => 'required |min:6',
            'email' => 'required|string|unique:users',
            'profile_image' => 'required|image',
        ]);
        
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $name = time() . \Str::random(30) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/imgs');
            $image->move($destinationPath, $name);
            $imageName = 'imgs/' . $name;
        }
    
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->profile_image=$imageName;
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
        // $usersFromDB = User::all();
        // $usersFromDB =  User::role('gymManager')->get();
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
        $users = User::all();

        $singleUser = User::find($id);

        return view("gymManager.edit", ['singleUser' => $singleUser, 'users' => $users]);
    }

    #=======================================================================================#
    #			                           Update Function                                	#
    #=======================================================================================#
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:2'],

        ]);


        User::where('id', $id)->update([

            'name' => $request->all()['name'],
            'email' => $request->email,



        ]);
        return redirect()->route('gymManager.list');

        
    }
    #=======================================================================================#
    #			                           Delete Function                                	#
    #=======================================================================================#
    // public function delete($id){
    //     $singleUser=User::findorfail($id);
    //     $singleUser->delete();
    //     return redirect()->route('gymManager.list');

    // }


    // using Ajax 
    public function deletegymManager($id)
    {

        $singleUser = User::findorfail($id);
        $singleUser->delete();
        return response()->json(['success' => 'Record deleted successfully!']);
    }
}
