<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class LogoutUsersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:logout-users-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if (now()->hour === 14 && now()->minute === 0) {
            // Log out all users
            Auth::logout();
            $this->info('All users logged out successfully.');
        } else {
            $this->info('It is not yet 3 o\'clock.');
        }
    
    }
}
