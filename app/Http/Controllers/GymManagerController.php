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
    public function store(Request $request){

        $requestData = request()->all();
        User::create($requestData);
        return redirect()->route('gymManager.list');
    }

#=======================================================================================#
#			                           List Function                                	#
#=======================================================================================#
    public function list(){
        $usersFromDB=User::all();
        // $usersFromDB =  User::role('cityManager')->get();
        return view("gymManager.list",['users'=>$usersFromDB]);

    }
#=======================================================================================#
#			                           Show Function                                	#
#=======================================================================================#
    public function show($id){
            $singleUser=User::findorfail($id);
            return view("gymManager.show",['singleUser' => $singleUser]);

    }
#=======================================================================================#
#			                           Edit Function                                	#
#=======================================================================================#
public function edit($id){
    $users =User::all();

    $singleUser=User::find($id);

    return view("gymManager.edit",['singleUser' => $singleUser,'users'=>$users]);

}

#=======================================================================================#
#			                           Update Function                                	#
#=======================================================================================#
public function update(Request $request, $id){
    $request->validate([
        'name' => ['required','string','min:2'],
        
    ]);


    User::where('id', $id)->update([

         'name' => $request->all()['name'],
         'email'=> $request->email,
         
         
         
     ]);
     return redirect()->route('gymManager.list');

}
#=======================================================================================#
#			                           Delete Function                                	#
#=======================================================================================#
    public function delete($id){
        $singleUser=User::findorfail($id);
        $singleUser->delete();
        return redirect()->route('gymManager.list');

    }
}
