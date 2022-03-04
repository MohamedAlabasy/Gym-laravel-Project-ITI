<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(PermissionsSeeder::class);              // 1 -for add Permission on database      
        $this->call(AdminSeeder::class);                    // 2- for add admin
        $this->call(CitiesManagerSeeder::class);
        $this->call(GymsManagerSeeder::class);
        $this->call(CoachesSeeder::class);




        $this->call(UsersSeeder::class);
    }
}
