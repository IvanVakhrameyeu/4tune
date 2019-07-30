<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    protected $fillable = [
        'user_id',
        'user_bonus_program_id'
    ];

    public function user()
    {
        $this->belongsTo('App\User');
    }

    public function userBonusProgram()
    {
        $this->belongsTo('App\UserBonusProgram');
    }

    public function referredBy()
    {
        $this->hasManyThrough('App\User', 'App\UserBonusProgram')->first();
    }
}
