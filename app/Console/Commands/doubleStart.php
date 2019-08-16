<?php

namespace App\Console\Commands;

use App\Repositories\DoubleSocketRepository;
use Illuminate\Console\Command;
use App\Jobs\PlayDoubleGame;
use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;

class doubleStart extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:doubleStart';

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
        dispatch(new PlayDoubleGame())->onQueue('doubleGameProcessing');
    }
}
