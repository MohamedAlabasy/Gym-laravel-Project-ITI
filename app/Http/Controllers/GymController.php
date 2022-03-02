<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model\Gym;
class GymController extends Controller
{
    //List Functioin
    public function list(){
        return view("gym.list");
    }
        //Show Function
        public function show($id){
        return view("gym.show");
    }

    //Create Function
    public function create(){
        return view("gym.create");

    }

    //Store Function
    public function store(Request $request){

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

