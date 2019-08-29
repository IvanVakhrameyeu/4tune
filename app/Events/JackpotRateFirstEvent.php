<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class JackpotRateFirstEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $image;
    public $name;
    public $amount;
    public $tickets;

    /***
     * JackpotRateFirstEvent constructor.
     * @param $image
     * @param $name
     * @param $amount
     * @param $tickets
     */
    public function __construct($image,$name,$amount,$tickets)
    {
        $this->image=$image;
        $this->name=$name;
        $this->amount=$amount;
        $this->tickets=$tickets;
    }

    /***
     * @return Channel|Channel[]
     */
    public function broadcastOn()
    {
        return new Channel('JackpotRateFirstChannel');
    }
}
