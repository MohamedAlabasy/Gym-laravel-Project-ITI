<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\MissUserNotification;
use Carbon\Carbon;

class Task extends Command implements ShouldQueue

{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:users-not-logged-in-for-month';
    //signature is the command that will run (name foe command)



    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'notify users not logged in for month';

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
        $users = User::whereDate('last_login_at', '<=', Carbon::now()->subDays(30)->toDateTimeString())->get();
        foreach ($users as $user) {
            $user->notify(new MissUserNotification($user));
        }
    }
}
