<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoubleGameBet extends Model
{
    protected $fillable = ['anticipated_event', 'game_type', 'amount', 'currency', 'status', 'user_id'];

}
