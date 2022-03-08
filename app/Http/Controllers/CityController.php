<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function list()
    {
        $allCities = City::all();
        if (count($allCities) <= 0) { //for empty statement
            return view('empty');
        }
        return view("city.list", ['allCities' => $allCities]);
    }
}
