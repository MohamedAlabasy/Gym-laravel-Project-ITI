<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Gym;
use App\Models\User;

class CoachController extends Controller
{
    //List Functioin
    public function list(){

        $gymsFromDB=User::all();

       
        return view("coach.list",['coaches'=>$gymsFromDB]);
    }
        //Show Function
        public function show($id){

        $singleGym=User::find($id);

        return view("coach.show");
    }

    //Create Function
    public function create()
    {
        return view('coach.create',[
            'users' => User::all(),
        ]);
    }

    //Store Function
    public function store(Request $request){
       
        $request->validate([
            'name' => ['required','string','min:2'],
            'email' => ['required'],
            
           
        ]);
        
        

        User::create($request->all());

        
        return redirect()->route('coach.list');

    }

    //Edit Function
    public function edit($id){
        $users =User::all();

        $singleGym=User::find($id);


        return view("coach.edit",['coach' => $singleGym,'users'=>$users]);
    }

     //Update Function
     public function update(Request $request, $id)
     {
        $request->validate([
            'name' => ['required','string','min:2'],
            
        ]);


        User::where('id', $id)->update([

             'name' => $request->all()['name'],
             'user_id'=> $request->user_id,
             
             
         ]);
         return redirect()->route('coach.list');
     }

    //Delete Function
    public function delete($id)
    {
           

            $singleGym=User::find($id);


            $singleGym->delete();
            return redirect(route('coach.list'));

    }
}