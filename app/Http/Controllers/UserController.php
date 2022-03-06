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
    #			                             create                                         	#
    #=======================================================================================#

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
        /* $user->profile_image=$imageName;
        $user->save(); */
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
    // public function destroy()
    // {
    //     return redirect()->route('');
    // }
}

/*

function update(Request $request, $id){
        $validated = $request->validate([
            'name' => 'required|unique:blogs|max:20',
            'desc' => 'required',
        ]);
        $blog=Blog::find($id);
        $blog->name=$request->name;
        $blog->desc=$request->desc;
        if($request->hasFile('image')){
            $image=$request->file('image');
            $name=time().\Str::random(30).'.'.$image->getClientOriginalExtension();
            $destinationPath=public_path('/images');
            $image->move($destinationPath,$name);
            $imageName='images/'.$name;
            if(isset( $blog->image))
                unlink( $blog->image);
                $blog->image=$imageName;
        }
        $blog->save();
        return redirect('/blog/list');
    }
*/
