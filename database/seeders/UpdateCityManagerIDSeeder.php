<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateCityManagerIDSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Because the system has only 24 cities
        for ($i = 1; $i <= 24; $i++) {
            DB::table('cities')->where('id', '=', $i)->update(['manager_id' => ($i + 2)]);
        }
    }
}
