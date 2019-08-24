<?php

namespace App\Console\Commands;

//use BeyondCode\LaravelWebSockets\Server\Logger\HttpLogger;
use App\DoubleGame;
use App\Repositories\DoublePusher;
use App\Repositories\StaticCallPusher;
use Illuminate\Console\Command;

use Thruway\Transport\PawlTransportProvider;


class DoublePushServer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'double:PushServer';

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

    public function handle()
    {
        StaticCallPusher::start();
    }
}
