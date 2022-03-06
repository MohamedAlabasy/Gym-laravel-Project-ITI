<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;



class GymManagerController extends Controller
{
        //Create Function
        public function create()
        {
            return view('gymManager.create');
        }

        // store Function
        public function store(Request $request)
        {
            $requestData= request()->all();
            user::create($requestData);
            return redirect()->route('gymManager.list');
        }



        //List Function
        public function list(){
            $usersFromDB=User::all();
            // $usersFromDB =  User::role('cityManager')->get();
            return view("gymManager.list",['users'=>$usersFromDB]);

        }
}
