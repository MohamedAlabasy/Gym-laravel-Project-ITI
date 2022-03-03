<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Database\Eloquent\Model\Gym;
use App\Models\Gym;
use App\Models\User;
class GymController extends Controller
{
    //List Functioin
    public function list(){
        $gymsFromDB=Gym::all();
        
        return view("gym.list",['gyms'=>$gymsFromDB]);
    }
        //Show Function
        public function show($id){
        $singleGym=Gym::find($id);
        return view("gym.show");
    }

    //Create Function
    public function create()
    {
        return view('gym.create',[
            'users' => User::all(),
        ]);
    }

    //Store Function
    public function store(Request $request){
       
        Gym::create($request->all());
        return redirect()->route('gym.list');

    }

    //Edit Function
    public function edit(){
        return view("gym.edit");
    }

     //Update Function
    public function update(){

    }

    //Delete Function
    public function delete(){

    }
}

