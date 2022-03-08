<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $gymsFromDB = City::all();
        if (count($gymsFromDB) <= 0) { //for empty statement
            return view('empty');
        }
        return view("city.list", ['gyms' => $gymsFromDB]);
    }
}
