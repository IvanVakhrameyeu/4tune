<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NvutiGame extends Model
{
    const NVUTI_GAME_STATUS_CLOSED = "closed";
    const NVUTI_GAME_STATUS_PENDING = "pending";
    const NVUTI_GAME_GAME_MIN = 0;
    const NVUTI_GAME_GAME_MAX = 999999;
    protected $fillable = ['name', 'status', 'game_hash', 'game_salt', 'game_salt2', 'game_number', 'hash',
        'user_id'];
}
