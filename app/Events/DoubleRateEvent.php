<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class DoubleRateEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $image;
    public $name;
    public $amount;
    public $color;

    /***
     * DoubleRateEvent constructor.
     * @param $image
     * @param $name
     * @param $amount
     * @param $color
     */
    public function __construct($image,$name,$amount,$color)
    {
        $this->image=$image;
        $this->name=$name;
        $this->amount=$amount;
        $this->color=$color;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('DoubleRateChannel');
    }
}
