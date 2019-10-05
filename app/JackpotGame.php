<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JackpotGame extends Model
{
    protected $fillable = ['status', 'game_number', 'room_number'];

    const JACKPOT_GAME__STATUS_PENDING = "pending";
    const JACKPOT_GAME_STATUS_CLOSED = "closed";
}
