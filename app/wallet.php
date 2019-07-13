<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class wallet extends Model
{
    protected $fillable=['balance','type','user_id'];
}
