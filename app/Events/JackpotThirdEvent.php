<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class JackpotThirdEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $arrayValueMessage;

    /***
     * JackpotThirdEvent constructor.
     * @param $arrayValueMessage
     */
    public function __construct($arrayValueMessage)
    {
        $this->arrayValueMessage= $arrayValueMessage;
    }

    /***
     * @return Channel|Channel[]
     */
    public function broadcastOn()
    {
        return new Channel('JackpotThirdChannel');
    }
}
