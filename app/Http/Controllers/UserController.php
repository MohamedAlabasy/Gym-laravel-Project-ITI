<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
 use App\Http\Controllers\Auth;
use App\Http\Requests\StoreRequest;

class UserController extends Controller
{

    #=======================================================================================#
    #			                             index                                         	#
    #=======================================================================================#
    public function index()
    {
        $users = User::all();

        return view('layouts.user-layout', [
            'users' => $users,

        ]);
    }
    #=======================================================================================#
    #			                        show_profile                                      	#
    #=======================================================================================#
    public function show_profile($user_id)
    {
        $user = User::find($user_id);
        return view('user.admin_profile', [
            'user' => $user,
        ]);
    }

    #=======================================================================================#
    #			                         edit_profile                                  	    #
    #=======================================================================================#
    public function edit_profile($user_id)
    {
        return view('user.edit_admin_profile', [
            'users' => User::find($user_id),
        ]);
    }
    #=======================================================================================#
    #			                             update                                        	#
    #=======================================================================================#
    public function update(StoreRequest $request, $user_id)
    {
        User::where('id', $user_id)->update([
            'name' => $request->all()['name'],
            'email' => $request->all()['email'],
        ]);
        return redirect()->route('user.admin_profile', auth()->user()->id);
    }
    #=======================================================================================#
    #			                             store                                         	#
    #=======================================================================================#
    public function store(StoreRequest $request)
    {
        $requestData = request()->all();
        User::create($requestData);
        return redirect()->route('user.admin_profile');
    }



    #=======================================================================================#
    #			                             destroy                                       	#
    #=======================================================================================#
    // public function destroy()
    // {
    //     return redirect()->route('');
    // }
}