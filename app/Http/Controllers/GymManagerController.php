<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class GymManagerController extends Controller
{
        //Create Function
        public function create()
        {
            return view('gymManager.create');
        }



        //List Function
        public function list(){
            $usersFromDB=User::all();
            // $usersFromDB =  User::role('cityManager')->get();
            return view("gymManager.list",['users'=>$usersFromDB]);

        }
}
