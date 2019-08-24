<?php

namespace App\Console\Commands;

use App\Repositories\DoublePusher;
use App\Repositories\DoubleSocketRepository;
use Illuminate\Console\Command;
use App\Jobs\PlayDoubleGame;
use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;
use Thruway\Peer\Client;
use Thruway\Transport\PawlTransportProvider;

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
    { $loop = \React\EventLoop\Factory::create();

        //DoublePusher::send();
        $client=new Client('double', $loop);
        $client->addTransportProvider(new PawlTransportProvider('ws://127.0.0.1:9090'));

        $client->on('open', function (\Thruway\ClientSession $clientSession) {
            for ($i = 0; $i < 5; $i++) {
                $clientSession->publish('double', ['Hello #' . $i]);
            }

            $clientSession->close();

       });
        $client->start();

       // dispatch(new PlayDoubleGame())->onQueue('doubleGameProcessing');
    }
}
