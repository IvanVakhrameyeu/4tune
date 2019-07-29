<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BonusProgramLink extends Model
{
    protected $fillable = [
        'user_id',
        'bonus_program_id'
    ];

    public function user()
    {
        $this->belongsTo('App\User');
    }

    public function bonusProgram()
    {
        $this->belongsTo('App\BonusProgram');
    }

    public function referrals()
    {
        $this->hasMany('App\Referral');
    }
}
