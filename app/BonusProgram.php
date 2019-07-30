<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BonusProgram extends Model
{
    const BONUS_PROGRAM_TYPE_DEPOSIT = 'deposit';
    const BONUS_PROGRAM_TYPE_WITHDRAW = 'withdraw';
    const BONUS_PROGRAM_TYPE_FREE = 'free';
    const BONUS_PROGRAM_TYPE_REFERRAL = 'referral';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'bonus_id',
        'type',
        'active'
    ];

    public function bonusProgramSettings()
    {
        $this->hasOne('App\BonusProgramSettings');
    }

    public function bonus()
    {
        $this->belongsTo('App\Bonus');
    }

    public function bonusProgramLinks()
    {
        $this->hasMany('App\UserBonusProgram');
    }

    public function bonusRules()
    {
        $this->hasOne('App\BonusProgramRules');
    }

}
