<?php

namespace App\Repositories;

use Ratchet\ConnectionInterface;

class DoubleSocketRepository extends BaseSocket
{
    protected $clients;

    public function __construct()
    {
        $this->clients = new \SplObjectStorage;
    }

    /**
     * When a new connection is opened it will be passed to this method
     * @param ConnectionInterface $conn The socket/connection that just connected to your application
     * @throws \Exception
     */
    function onOpen(ConnectionInterface $conn)
    {
        $this->clients->attach($conn);
        info('new connect');
    }

    /**
     * This is called before or after a socket is closed (depends on how it's closed).  SendMessage to $conn will not result in an error if it has already been closed.
     * @param ConnectionInterface $conn The socket/connection that is closing/closed
     * @throws \Exception
     */
    function onClose(ConnectionInterface $conn)
    {
        $this->clients->detach($conn);
    }


    function onError(ConnectionInterface $conn, \Exception $e)
    {
        $conn->close();
    }

    /***
     * логика, чтобы отображало у всех пользователей и на что они поставили
     * @param ConnectionInterface $from
     * @param string $msg
     */
    function onMessage(ConnectionInterface $from, $msg)
    {
        info($msg);
        foreach ($this->clients as $client) {
            if ($from != $client) {
                $client->send($msg);
            }
        }
    }
}
