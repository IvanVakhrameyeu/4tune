<?php

namespace App\Console\Commands;

use App\Jobs\PlayJackpotGame;
use Illuminate\Console\Command;

class JackpotStart extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'jackpotStart {numberJackpotRoom}';

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
        $numberJackpotRoom= $this->argument('numberJackpotRoom');
        dispatch(new PlayJackpotGame($numberJackpotRoom))->onQueue('jackpotGameProcessing');
    }
}
