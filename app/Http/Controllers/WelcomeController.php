<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Gym;
use App\Models\Revenue;
use App\Models\TrainingSession;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    private $userID, $userRole, $cities = 0, $citiesManagers = 0, $gyms = 0, $gymsManagers = 0,
        $coaches = 0, $users = 0, $totalRevenue = 0, $revenueInDollars = 0;
    #=======================================================================================#
    #			                               index                                       	#
    #=======================================================================================#
    public function index()
    {
        $this->userID = Auth::id();
        $this->userData = User::find($this->userID);
        $this->userRole = Auth::user()->getRoleNames();


        switch ($this->userRole['0']) {
            case 'admin':
                $this->totalRevenue = (Revenue::sum('price')) / 100;
                $this->revenueInDollars = number_format($this->totalRevenue, 2, ',', '.');
                $this->cities = count(City::get('name'));
                $this->citiesManagers =  count(User::role('cityManager')->get());
                $this->gyms =  count(Gym::get('name'));
                $this->gymsManagers =  count(User::role('gymManager')->get());
                $this->coaches = count(User::role('coach')->get());
                $this->users = count(User::role('user')->get());
                break;
            case 'cityManager':
                //get all user in cityManager city
                $userOfCity = City::find($this->userData['city_id'])->users;

                //get totalRevenue in cityManager city
                foreach ($userOfCity as $usersID) {
                    $this->totalRevenue += (Revenue::where('user_id', '=', $usersID['id'])->sum('price')) / 100;
                }
                $this->revenueInDollars = number_format($this->totalRevenue, 2, ',', '.');

                $this->gyms = count(Gym::where('city_id', '=', $this->userData['city_id'])->get());

                //get users by type in cityManager city
                foreach ($userOfCity as $singleUser) {
                    if ($singleUser->hasRole('gymManager')) {
                        $this->gymsManagers++;
                    } elseif ($singleUser->hasRole('coach')) {
                        $this->coaches++;
                    } elseif ($singleUser->hasRole('user')) {
                        $this->users++;
                    }
                }

                break;
            case 'gymManager':
                //get all user in gymManager gym
                $userOfGym = Gym::find($this->userData['gym_id'])->users;

                //get totalRevenue in gymManager gyms
                foreach ($userOfGym as $usersID) {
                    $this->totalRevenue += (Revenue::where('user_id', '=', $usersID['id'])->sum('price')) / 100;
                }
                $this->revenueInDollars = number_format($this->totalRevenue, 2, ',', '.');

                //get users by type in gymManager gym
                foreach ($userOfGym as $singleUser) {
                    if ($singleUser->hasRole('coach')) {
                        $this->coaches++;
                    } elseif ($singleUser->hasRole('user')) {
                        $this->users++;
                    }
                }
                break;
            case 'coach':
                $userOfGym = User::with(['trainingSessions'])->where('id', $this->userID)->first();
                if (count($userOfGym->trainingSessions) <= 0) { //for empty statement
                    return view('empty');
                }
                return view("welcome", [
                    'trainingSessions' => $userOfGym->trainingSessions,
                ]);
                break;
        }

        return view("welcome", [
            'cities' => $this->cities,
            'citiesManagers' => $this->citiesManagers,
            'gyms' => $this->gyms,
            'gymsManagers' => $this->gymsManagers,
            'coaches' => $this->coaches,
            'users' => $this->users,
            'revenueInDollars' => $this->revenueInDollars,
        ]);
    }
}
