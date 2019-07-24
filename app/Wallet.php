<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable=['balance','type','user_id'];

    static public function getMoney($user_id){
        return static::where('user_id',$user_id)->first()->balance;
    }
}
