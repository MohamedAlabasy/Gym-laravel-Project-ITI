<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Database\Eloquent\Model\Gym;

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
        $gymsFromDB = Gym::all();
        if (count($gymsFromDB) <= 0) { //for empty statement
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
            'cover_image' => ['required', 'mimes:jpg,jpeg'],


        ]);

        if ($request->hasFile('cover_image'))
        {
             $file=$request->file('cover_image');
             $filename = time() .\Str::random(30).'.'.$file->getClientOriginalExtension();
             $destination = $file->getClientOriginalExtension();
             $file->move($destination,$filename);
             $file='imgs'.$filename;
             
        }
        


        $gym = new Gym();
        $gym->name = $request->name;
        
        $gym->cover_image = $file;
        
        $gym->save();
        return redirect()->back()->with('status','picture added suceccfully');
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
        $request->validate([
            'name' => ['required', 'string', 'min:2'],
            'cover_image' => ['required', 'mimes:jpg,jpeg'],
            
        ]);
        $gym = new Gym();
        $gym->name = $request->name;

        $file=$request->file('cover_image');
        $filename = time() .\Str::random(30).'.'.$file->getClientOriginalExtension();
        $destination = public_path('/imgs');
        $file->move($destination,$filename);
        $file='imgs'.$filename;
        
        if(isset( $gym->cover_image))
        File::delete(public_path('imgs/' . $gym->cover_image));
       $gym->cover_image=$file;

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