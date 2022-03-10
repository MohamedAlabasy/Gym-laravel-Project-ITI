<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GymRequest;
use App\Http\Requests\UpdateGymRequest;
use App\Models\Gym;
use App\Models\User;
use Illuminate\Support\Facades\File;
class GymController extends Controller
{
    #=======================================================================================#
    #			                          List Function                                   	#
    #=======================================================================================#
    public function list()
    {
        $gymsFromDB = Gym::all();//role('cityManager')->withoutBanned()->get();
        if (count($gymsFromDB) <= 0) { //for gym empty statement
            return view('empty');
        }
        return view("gym.list", ['gyms' => $gymsFromDB]);
    }
    #=======================================================================================#
    #			                            Show Function                                 	#
    #=======================================================================================#

    public function show($id)
    {

        $singleGym = Gym::find($id);

        return view("gym.show", ['singleGym' => $singleGym]);
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
        $request->validate([
            'name' => ['required', 'string', 'min:2'],
            'cover_image' =>'required|image|mimes:jpg,jpeg',
            ]);
            if ($request->hasFile('cover_image')) {
                $image = $request->file('cover_image');
                $name = time() . \Str::random(30) . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/imgs');
                $image->move($destinationPath, $name);
                $imageName = 'imgs/' . $name;
            }
        

        $gym = new Gym();
        $gym->name = $request->name;
        $gym->cover_image = $imageName;
        $gym->save();
        return redirect()->route('gym.list');
    }


    #=======================================================================================#
    #			                            Edit Function                             	    #
    #=======================================================================================#
    public function edit($id)

    {
        $users = User::all();
        $singleGym = Gym::find($id);
        return view("gym.edit", ['gym' => $singleGym, 'users' => $users]);
        
    }
    

    //Update Function
    public function update(Request $request, $id)
    {
        $gym=Gym::find($id);
        $validated = $request->validate([
            'name' => 'required|max:20',
           
            'cover_image' => 'required|image|mimes:jpg,jpeg',
        ]);

       
        $gym->name=$request->name;
       
       
    

        if($request->hasFile('cover_image')){
            $image=$request->file('cover_image');
            $name=time().\Str::random(30).'.'.$image->getClientOriginalExtension();
            $destinationPath=public_path('/imgs');
            $image->move($destinationPath,$name);
            $imageName='imgs/'.$name;
            if(isset( $gym->cover_image))
                  File::delete(public_path('imgs/' . $gym->cover_image));
                $gym->cover_image=$imageName;
            
        }
        $gym->save();
        return redirect()->route('gym.list');


        
    }

    //Delete Function

    public function deleteGym($id)
    {

        $singleGym = Gym::find($id);
        $singleGym->delete();
        return response()->json(['success' => 'Record deleted successfully!']);
    }
}