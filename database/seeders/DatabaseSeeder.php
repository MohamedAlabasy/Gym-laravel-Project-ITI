<?php

namespace Database\Seeders;

use App\Models\TrainingSession;
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
        $this->call(PermissionsSeeder::class);
        $this->call(CitiesSeeder::class);
        $this->call(GymsSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(CitiesManagerSeeder::class);
        $this->call(GymsManagerSeeder::class);
        $this->call(CoachesSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(TrainingPackagesSeeder::class);
        $this->call(RevenueSeeder::class);
        $this->call(TrainingSessionSeeder::class);
        $this->call(AttendanceSeeder::class);
        $this->call(TrainingSessionUserSeeder::class);
        $this->call(GymsTrainingPackagesSeeder::class);
        $this->call(UpdateCityManagerIDSeeder::class);
        $this->call(AddNewEmailTOUSer::class);
    }
}
