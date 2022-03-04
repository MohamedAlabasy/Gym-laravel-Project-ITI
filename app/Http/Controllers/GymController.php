<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Database\Eloquent\Model\Gym;

use App\Http\Requests\GymRequest;
use App\Http\Requests\UpdateGymRequest;

use App\Models\Gym;
use App\Models\User;

class GymController extends Controller
{
    #=======================================================================================#
    #			                          List Function                                   	#
    #=======================================================================================#
    public function list()
    {
        $gymsFromDB = Gym::all();

        return view("gym.list", ['gyms' => $gymsFromDB]);
    }
    #=======================================================================================#
    #			                            Show Function                                 	#
    #=======================================================================================#
    public function show($id)
    {
        $singleGym = Gym::find($id);
        return view("gym.show");
    }
    #=======================================================================================#
    #			                           Create Function                              	#
    #=======================================================================================#
    public function create()
    {
        return view('gym.create', [
            'users' => User::all(),
        ]);
    }
    #=======================================================================================#
    #			                           Store Function                                 	#
    #=======================================================================================#
    public function store(Request $request)
    {

<<<<<<< HEAD
    //Store Function
    public function store(Request $request){
       
        $request->validate([
            'name' => ['required','string','min:2'],
           
        ]);
        
=======
>>>>>>> ee1d150688fd24bdafa12a660c6abde972147e16
        Gym::create($request->all());
        return redirect()->route('gym.list');
    }
<<<<<<< HEAD

    //Edit Function
    public function edit($id){
        $users =User::all();
        $singleGym=Gym::find($id);
        return view("gym.edit",['gym' => $singleGym,'users'=>$users]);
    }

     //Update Function
     public function update(Request $request, $id)
     {
        $request->validate([
            'name' => ['required','string','min:2'],
            
        ]);

         Gym::where('id', $id)->update([
             'name' => $request->all()['name'],
             'user_id'=> $request->user_id,
             
             
         ]);
         return redirect()->route('gym.list');
     }

    //Delete Function
    public function delete($id)
    {
           
            $singleGym=Gym::find($id);
            $singleGym->delete();
            return redirect(route('gym.list'));

=======
    #=======================================================================================#
    #			                            Edit Function                             	    #
    #=======================================================================================#
    public function edit()
    {
        return view("gym.edit");
    }
    #=======================================================================================#
    #			                            Update Function                              	#
    #=======================================================================================#
    public function update()
    {
    }
    #=======================================================================================#
    #			                            Delete Function                              	#
    #=======================================================================================#
    public function delete()
    {
>>>>>>> ee1d150688fd24bdafa12a660c6abde972147e16
    }
}
