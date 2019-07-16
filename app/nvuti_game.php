<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nvuti_game extends Model
{
    protected $fillable=['name','status','game_hash','game_salt','game_salt2','game_number','hash',
        'user_id'];
}
