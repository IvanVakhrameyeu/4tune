<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NvutiGameBet extends Model
{
    protected $fillable = ['numbers_range', 'amount', 'currency', 'status', 'user_id'];
}

