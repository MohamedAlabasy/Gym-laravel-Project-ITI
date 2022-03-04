<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(100)->create();
        //to get last 100 row add in DB
        $users = User::latest()->take(100)->get();

        //give them role => user
        foreach ($users as $userRole) {
            $userRole->assignRole('user');
        }
    }
}
