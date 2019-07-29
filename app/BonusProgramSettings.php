<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BonusProgramSettings extends Model
{
    const BONUS_PROGRAM_TYPE_DEPOSIT = 'deposit';
    const BONUS_PROGRAM_TYPE_WITHDRAW = 'withdraw';
    const BONUS_PROGRAM_TYPE_FREE = 'free';
    const BONUS_PROGRAM_TYPE_REFERRAL = 'referral';

    protected $fillable = [
        'bonus_program_id',
        'code',
        'end_time',
        'bonus_program_type',
    ];

    public function bonusProgram()
    {
        $this->belongsTo('App\BonusProgram');
    }
}
