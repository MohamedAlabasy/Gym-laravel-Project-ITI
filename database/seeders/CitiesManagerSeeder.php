<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitiesManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(24)->create();
        //to get last 24 row add in DB
        $citiesManager = User::latest()->take(24)->get();

        //give them role => cityManager
        foreach ($citiesManager as $cityManagerRole) {
            $cityManagerRole->assignRole('cityManager');
        }
    }
}
