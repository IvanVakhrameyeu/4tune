<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoubleGameBet extends Model
{
    protected $fillable = ['anticipated_event', 'amount', 'status', 'user_id', 'game_id'];

}
