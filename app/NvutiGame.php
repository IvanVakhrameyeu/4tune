<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NvutiGame extends Model
{
    protected $fillable=['name','status','game_hash','game_salt','game_salt2','game_number','hash',
        'user_id'];
}
