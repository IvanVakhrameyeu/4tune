<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NvutiGame extends Model
{
 public Const STATUS_DONE = "done";
 public Const STATUS_PLAYS = "plays";
 public Const GAME_MIN = 0;
 public Const GAME_MAX = 999999;
    protected $fillable = ['name', 'status', 'game_hash', 'game_salt', 'game_salt2', 'game_number', 'hash',
        'user_id'];
}
