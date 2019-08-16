<?php

namespace App\Console\Commands;

use BeyondCode\LaravelWebSockets\Server\Logger\HttpLogger;
use Illuminate\Console\Command;

use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\Wamp\WampServer;
use Ratchet\WebSocket\WsServer;

use App\Repositories\DoublePusher;
use React\EventLoop\Factory as ReactLoop;
use React\Socket\Server as ReactServer;
use React\ZMQ\Context as ReactContext;



class DoublePushServer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'double:serverPush';

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

    /***
     * @throws \ZMQSocketException
     */
    public function handle()
    {
        $loop = ReactLoop::create();

        $pusher = new DoublePusher;

        $context = new ReactContext($loop);

        $pull = $context->getSocket(\ZMQ::SOCKET_PULL);
        $pull->bind('tcp://localhost:5555');
        $pull->on('message', [$pusher, 'broadcast']);

        $webSock = new ReactServer($loop);
        $webSock->listen(8080, '0.0.0.0');
        $webServer = new IoServer(
            new HttpServer(
                new WsServer(
                    new WampServer(
                        $pusher
                    )
                )
            ), $webSock
        );
    }
}
