<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class JackpotFirstEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $arrayValueMessage;
    public $name;
    public $winAmount;
    public $ticketWin;

    /***
     * JackpotFirstEvent constructor.
     * @param $arrayValueMessage
     */
    public function __construct($arrayValueMessage)
    {
        $this->arrayValueMessage= $arrayValueMessage;
      //  $this->name= $name;
      //  $this->winAmount= $winAmount;
      //  $this->ticketWin= $ticketWin;
    }

    /**
     * @return Channel|Channel[]
     */
    public function broadcastOn()
    {
        return new Channel('JackpotFirstChannel');
    }
}
