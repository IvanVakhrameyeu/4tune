<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserBonusProgram extends Model
{
    protected $fillable = [
        'user_id',
        'bonus_program_id',
        'join_url'
    ];

    public function user()
    {
        $this->belongsTo('App\User');
    }

    public function bonusProgram()
    {
        $this->belongsTo('App\BonusProgram');
    }

    public function userBonusProgramInfo()
    {
        $this->hasOne('App\UserBonusProgramInfo');
    }

    public function referrals()
    {
        $this->hasMany('App\Referral');
    }
}
