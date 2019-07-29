<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BonusType extends Model
{
    const BONUS_TYPE_REAL = 'real';
    const BONUS_TYPE_COIN = 'coin';
    const BONUS_TYPE_DOUBLE_COIN = 'double_coin';
    const BONUS_TYPE_JACKPOT_COIN = 'jackpot_coin';
    const BONUS_TYPE_NVUTI_COIN = 'nvuti_coin';

    protected $fillable = ['name'];

    public function bonuses()
    {
        $this->hasMany('App\Bonus');
    }
}
