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

    public $name;
    public $winAmount;
    public $ticketWin;

    /***
     * JackpotFirstEvent constructor.
     * @param $name
     * @param $winAmount
     * @param $ticketWin
     */
    public function __construct($name,$winAmount,$ticketWin)
    {
        $this->name= $name;
        $this->winAmount= $winAmount;
        $this->ticketWin= $ticketWin;
    }

    /**
     * @return Channel|Channel[]
     */
    public function broadcastOn()
    {
        return new Channel('JackpotFirstChannel');
    }
}
