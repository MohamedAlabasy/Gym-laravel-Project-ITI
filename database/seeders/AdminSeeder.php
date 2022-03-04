<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #=======================================================================================#
        #			                   To add admin from  seeders                           	#
        #=======================================================================================#
        User::firstOrCreate([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456')
        ]);
        // $admin = User::find(1);
        // $admin->assignRole('admin');
    }
}
