<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserBonusProgramInfo extends Model
{
    protected $fillable = [
        'user_bonus_program_id',
        'progress',
        'level',
        'status',
        'bonus_history'
    ];

    public function userBonusProgram()
    {
        $this->belongsTo('App\UserBonusProgram');
    }
}
