<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GymsManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(40)->create();
        //to get last 40 row add in DB
        $gymsManager = User::latest()->take(40)->get();

        //give them role => gymManager
        foreach ($gymsManager as $gymManagerRole) {
            $gymManagerRole->assignRole('gymManager');
        }
    }
}
