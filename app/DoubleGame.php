<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoubleGame extends Model
{
    const DOUBLE_GAME_STATUS_CLOSED = "closed";
    const DOUBLE_GAME_STATUS_PENDING = "pending";

    const DOUBLE_GAME_COLOR_GREEN = "green";
    const DOUBLE_GAME_COLOR_RED = "red";
    const DOUBLE_GAME_COLOR_BLACK = "black";

    const DOUBLE_GAME_URL = "127.0.0.1";
    const DOUBLE_GAME_PORT = "9090";

    protected $fillable = ['name', 'status', 'game_hash', 'game_salt', 'game_number'];
}
