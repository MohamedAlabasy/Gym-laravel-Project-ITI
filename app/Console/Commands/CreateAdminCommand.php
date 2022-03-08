<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:admin {--email=admin20@admin.com} {--password=123456}';
    // php artisan create:admin --email=admin2@admin.com --password=123456
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create a new admin';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     parent::__construct();
    // }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        #=======================================================================================#
        #			                   To add admin from command                               	#
        #=======================================================================================#
        $adminName = explode("@", $this->option('email'));
        $user = User::create([
            'name' => $adminName[0],
            'email' =>  $this->option('email'),
            'password' => bcrypt($this->option('password'))
        ])->assignRole('admin');
        // $makeAdmin = User::latest()->first(); //to get last row add in DB and make it admin
        // $user->assignRole('admin');
        $this->info("$adminName[0] has been created successfully");
    }
}
