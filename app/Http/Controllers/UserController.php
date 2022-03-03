<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{

    public function index()
    {
        $users=User::all();
        // ->where('user_type', '==', 'Admin')
        // ->get()->toArray();
        return view('layouts.user-layout',[
           'users'=>$users,
        ]);
    }
    public function show_profile($user_id)
    {
        $user= User::find($user_id);
        return view('user.admin_profile', [
            'user' => $user,
        ]);
    }


    public function edit_profile($user_id)
    {
        return view('user.edit_admin_profile', [
            'users' => User::find($user_id),
        ]);
    }
    public function update(Request $request, $user_id)
    {
        User::where('id', $user_id)->update([
            'name' => $request->all()['name'],
            'email' => $request->all()['email'],


        ]);
        return redirect()->route('user.admin_profile',auth()->user()->id);
    }
    public function store(Request $request)
    {
        $requestdata = request()->all();
        User::create($requestdata);

        return redirect()->route('user.admin_profile');
    }




    // public function destroy()
    // {


    //     return redirect()->route('');
    // }
}