<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JackpotGameBet extends Model
{
    protected $fillable = ['tickets_min_range', 'tickets_max_range', 'amount', 'room_number', 'status', 'user_id', 'game_id'];
}
