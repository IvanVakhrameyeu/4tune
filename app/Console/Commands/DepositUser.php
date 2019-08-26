<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class DepositUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:deposit {userId} {amount}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $userId= $this->argument('userId');
        $amount= $this->argument('amount');

        $user=User::where([
            ['id', '=', $userId],
        ])->first();

        $user->depositFloat($amount);
    }
}