<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Gym;
use App\Models\Revenue;
use App\Models\User;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    #=======================================================================================#
    #			                               index                                       	#
    #=======================================================================================#
    public function index()
    {
        $cities = count(City::get('name'));
        $citiesManagers =  count(User::role('cityManager')->get());
        $gyms =  count(Gym::get('name'));
        $gymsManagers =  count(User::role('gymManager')->get());
        $coaches = count(User::role('coach')->get());
        $users = count(User::role('user')->get());

        $totalRevenue = (Revenue::sum('price')) / 100;
        $revenueInDollars = number_format($totalRevenue, 2, ',', '.');

        return view("welcome", [
            'cities' => $cities,
            'citiesManagers' => $citiesManagers,
            'gyms' => $gyms,
            'gymsManagers' => $gymsManagers,
            'coaches' => $coaches,
            'users' => $users,
            'revenueInDollars' => $revenueInDollars,
        ]);
    }
}
