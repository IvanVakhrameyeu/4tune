<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    protected $fillable = [
        'user_id',
        'bonus_program_link_id'
    ];

    public function user()
    {
        $this->belongsTo('App\User');
    }

    public function bonusProgramLink()
    {
        $this->belongsTo('App\BonusProgramLink');
    }

    public function referredBy()
    {
        $this->hasManyThrough('App\User', 'App\BonusProgramLink')->first();
    }
}
