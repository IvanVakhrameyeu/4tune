<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoubleGame extends Model
{
    const DOUBLE_GAME_STATUS_CLOSED = "closed";
    const DOUBLE_GAME_STATUS_PENDING = "pending";

    protected $fillable = ['name', 'status', 'game_hash', 'game_salt', 'game_salt2', 'game_number', 'hash',
        'user_id'];
}
