<?php

namespace App\Console\Commands;

use App\Repositories\DoubleRouteServer;
use App\Repositories\DoubleSocketRepository;
use Illuminate\Console\Command;
use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;
use Thruway\Transport\RatchetTransportProvider;

class DoubleServerStart extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'double:serverStart';

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
        $router = new DoubleRouteServer();
        $transportProvider = new RatchetTransportProvider("127.0.0.1", 9090);
        $router->addTransportProvider($transportProvider);
        $router->start();
        /*
        info('start double game');
        $server = IoServer::factory(
            new HttpServer(
                new WsServer(
                    new DoubleSocketRepository()
                )
            ), 8080
        );
        $server->run();*/
    }
}
