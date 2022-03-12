<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddNewEmailTOUSer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alabasy =  DB::table('users')->insert([
            'name' => 'Mohamed Alabasy',
            'email' => 'mo7amed.el3basy@gmail.com',
            'is_verifications' =>         '1',
            'email_verified_at' => '2022-03-12 12:39:55',
            'national_id' => '29963709286168',
            'password' => '$2y$10$c/WbS3jawweOO0mVRyalX.qmBAGrg.2UGCn1npqP0psqCzT4VfETm',
            'remember_token' => '8lWDHvKu56',
            'gender' => 'male',
            'profile_image' => 'https://via.placeholder.com/200x200.png/004488?text=molestias',
            'birth_date' => '1997-10-31',
            'last_login_at' => '2022-01-12 12:39:56',
            'total_sessions' => '91',
            'remain_session' => '33',
            'created_at' => '2022-03-12 13:11:56',
            'updated_at' => '2022-03-12 13:11:56',
            'city_id' => '12',
            'gym_id' => '1',
        ]);
        $gehad =  DB::table('users')->insert([
            'name' => 'gehad mosaad',
            'email' => 'gehadmosaad300@gmail.com',
            'is_verifications' => '1',
            'email_verified_at' => '2022-03-12 12:39:55',
            'national_id' => '29963709246168',
            'password' => '$2y$10$c/WbS3jawweOO0mVRyalX.qmBAGrg.2UGCn1npqP0psqCzT4VfETm',
            'remember_token' => '8lWDHvKu56',
            'gender' => 'female',
            'profile_image' => 'https://via.placeholder.com/200x200.png/004488?text=molestias',
            'birth_date' => '1997-10-31',
            'last_login_at' => '2022-01-12 12:39:56',
            'total_sessions' => '91',
            'remain_session' => '33',
            'created_at' => '2022-03-12 13:11:56',
            'updated_at' => '2022-03-12 13:11:56',
            'city_id' => '13',
            'gym_id' => '2',
        ]);

        $users = User::latest()->take(2)->get();

        //give them role => user
        foreach ($users as $userRole) {
            $userRole->assignRole('user');
        }
    }
}
