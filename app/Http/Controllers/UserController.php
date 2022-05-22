<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;




class UserController extends Controller
{

    #=======================================================================================#
    #			                             create                                         #
    #=======================================================================================#
    public function unAuth()
    {
        return view('500');
    }

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

        $user = User::find($user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $name = time() . \Str::random(30) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/imgs');
            $image->move($destinationPath, $name);
            $imageName = 'imgs/' . $name;
            if ($user->profile_image)
                File::delete(public_path('imgs/' . $user->profile_image));
            $user->profile_image = $imageName;
        }
        $user->save();
        return redirect()->route('user.admin_profile', auth()->user()->id)->with('success', 'Your data successfully updated');
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
    public function destroy()
    {
        return redirect()->route('');
    }

    #=======================================================================================#
    #			                            Ban User                              	        #
    #=======================================================================================#
    public function banUser($userID)
    {
        User::find($userID)->ban([
            'comment' => 'كيفي كدا',
            'expired_at' => '+3 month',
        ]);
        return response()->json(['success' => 'Record deleted successfully!']);
    }

    #=======================================================================================#
    #			                            listBanned                             	        #
    #=======================================================================================#
    public function listBanned()
    {
        $userRole = Auth::user()->getRoleNames();
        $allBannedUser = 0;
        switch ($userRole['0']) {
            case 'admin':
                $allBannedUser = User::role(['cityManager', 'gymManager', 'coach', 'user'])->onlyBanned()->get();
                break;
            case 'cityManager':
                $allBannedUser = User::role(['gymManager', 'coach', 'user'])->onlyBanned()->get();
                break;
            case 'gymManager':
                $allBannedUser = User::role(['coach', 'user'])->onlyBanned()->get();
                break;
        }
        if (count($allBannedUser) <= 0) { //for empty statement
            return view('empty');
        }
        return view('ban.showBanned', [
            'banUsers' => $allBannedUser,
        ]);
    }
    #=======================================================================================#
    #			                                unBan                             	        #
    #=======================================================================================#
    public function unBan($userID)
    {
        $x = User::find($userID)->unban();
        return $this->listBanned();
    }
}
