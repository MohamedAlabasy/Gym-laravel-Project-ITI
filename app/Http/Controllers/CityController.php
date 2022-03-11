<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityRequest;
use App\Http\Requests\UpdateCityRequest;
use App\Models\City;
use App\Models\Gym;
use App\Models\Revenue;
use App\Models\User;
use Illuminate\Http\Request;

class CityController extends Controller
{
    #=======================================================================================#
    #			                          list Function                                   	#
    #=======================================================================================#
    public function list()
    {
        $allCities = City::all();
        if (count($allCities) <= 0) { //for empty statement
            return view('empty');
        }
        return view("city.list", ['allCities' => $allCities]);
    }

    #=======================================================================================#
    #			                          show Function                                   	#
    #=======================================================================================#
    public function show($cityID)
    {
        $totalRevenue = 0;
        $gymsManagers = 0;
        $coaches = 0;
        $users = 0;

        $cityData = City::find($cityID);
        $userOfCity = $cityData->users;

        $citiesManagers = User::find($cityData->manager_id);

        foreach ($userOfCity as $usersID) {
            $totalRevenue += (Revenue::where('user_id', '=', $usersID['id'])->sum('price')) / 100;
        }
        $revenueInDollars = number_format($totalRevenue, 2, ',', '.');

        $gyms = count(Gym::where('city_id', '=', $cityID)->get());

        //get users by type in cityManager city
        foreach ($userOfCity as $singleUser) {
            if ($singleUser->hasRole('gymManager')) {
                $gymsManagers++;
            } elseif ($singleUser->hasRole('coach')) {
                $coaches++;
            } elseif ($singleUser->hasRole('user')) {
                $users++;
            }
        }
        return view("city.show", [
            'citiesManagers' => $citiesManagers,
            'gyms' => $gyms,
            'gymsManagers' => $gymsManagers,
            'coaches' => $coaches,
            'users' => $users,
            'revenueInDollars' => $revenueInDollars,
        ]);
    }
    #=======================================================================================#
    #			                          create Function                                   #
    #=======================================================================================#
    public function create()
    {
        $cityManagers = $this->selectCityManagers();
        return view("city.create", ['cityManagers' => $cityManagers]);
    }
    #=======================================================================================#
    #			                          store Function                                   #
    #=======================================================================================#
    public function store(CityRequest $request)
    {
        $requestData = request()->all();
        if ($requestData['manager_id'] == 'optional') {
            City::create([
                'name' => $requestData['name'],
            ]);
        } else {
            City::create($requestData);
        }
        return $this->list();
    }
    #=======================================================================================#
    #			                          edit Function                                     #
    #=======================================================================================#
    public function edit($cityID)
    {
        $cityData = City::find($cityID);
        $cityManagers = $this->selectCityManagers();
        return view('city.edit', ['cityData' => $cityData, 'cityManagers' => $cityManagers]);
    }
    #=======================================================================================#
    #			                          edit Function                                     #
    #=======================================================================================#
    public function update($cityID, UpdateCityRequest $request)
    {
        $fetchData = request()->all();
        $flight = City::find($cityID);
        $flight->name = $fetchData['name'];
        if ($fetchData['manager_id'] == 'optional')
            $flight->manager_id = null;
        else
            $flight->manager_id = $fetchData['manager_id'];
        $flight->save();
        return $this->list();
    }

    #=======================================================================================#
    #			                          destroy Function                                  #
    #=======================================================================================#
    public function destroy($cityID)
    {
        $city = City::find($cityID);
        $city->delete($cityID);
        return $this->list();
    }
    #=======================================================================================#
    #			                 restored deleted Cities Function                           #
    #=======================================================================================#
    public function showDeleted()
    {
        $deletedCity = City::onlyTrashed()->get();
        if (count($deletedCity) <= 0) { //for empty statement
            return view('empty');
        }
        return view('city.showDeleted', ['deletedCity' => $deletedCity]);
    }
    #=======================================================================================#
    #			                 restore deleted Cities Function                            #
    #=======================================================================================#
    public function restore($cityID)
    {
        City::withTrashed()->find($cityID)->restore();
        return $this->showDeleted();
    }

    #=======================================================================================#
    #			            private Function used in this controller                        #
    #=======================================================================================#
    private function selectCityManagers()
    {
        return User::select('users.*', 'cities.manager_id')
            ->role('cityManager')
            ->withoutBanned()
            ->leftJoin('cities', 'users.id', '=', 'cities.manager_id')
            ->whereNull('cities.manager_id')
            ->get();
    }
}
