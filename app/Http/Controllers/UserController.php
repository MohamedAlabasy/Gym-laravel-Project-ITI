<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth;
use App\Http\Requests\StoreRequest;
use Illuminate\Support\Str;

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

        $user=User::find($user_id);
        $user->name=$request->name;
        $user->email=$request->email;
        if($request->hasFile('profile_image')){
            $image=$request->file('profile_image');
            $name=time().\Str::random(30).'.'.$image->getClientOriginalExtension();
            $destinationPath=public_path('/imgs');
            $image->move($destinationPath,$name);
            $imageName='imgs/'.$name;
            if(isset( $user->profile_image))
                unlink( $user->profile_image);
                $user->profile_image=$imageName;
                // if( auth()->$user->isDirty('email'))
        }
        $user->save();
        return redirect()->route('user.admin_profile', auth()->user()->id);
    }
    #=======================================================================================#
    #			                             store                                         	#
    #=======================================================================================#
    public function store(StoreRequest $request)
 {     $requestData = request()->all();
     User::create($requestData);



     return redirect()->route('user.admin_profile');
}


    #=======================================================================================#
    #			                             destroy                                       	#
    #=======================================================================================#
    public function destroy()
    {
        return redirect()->route('');
    }









    #=======================================================================================#
    #			                            Ban User                              	        #
    #=======================================================================================#
    public function listBanned()
    {

        // for ($i = 100; $i < 120; $i++) {
        //     $user = User::find($i);
        //     $user->ban([
        //         'comment' => 'كيفي كدا',
        //         // 'expired_at' => '2025-03-28 00:00:00',
        //         'expired_at' => '+3 month',
        //     ]);
        // }
        // $users = User::onlyBanned()->get();
        // $users = User::withBanned()->get();
        // $users = User::withoutBanned()->get();
        // dd($users);
        return view('user.showBanned', [
            'banUsers' => User::onlyBanned()->get(),
        ]);
    }

    public function unBan($userID)
    {
        $user = User::find($userID);
        // // $user =  DB::table('bans')->where('bannable_id', '=', 100)->get();
        // $user =  DB::table('users')->where('id', '=', 100)->get();
        // $user->unban();
        return view('user.showBanned', [
            'banUsers' => User::onlyBanned()->get(),
        ]);
    }
}