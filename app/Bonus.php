<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bonus extends Model
{
    const BONUS_AMOUNT_TYPE_PERCENT = 'percent';
    const BONUS_AMOUNT_TYPE_CASH = 'cash';

    protected $fillable = [
        'name',
        'slug',
        'bonus_type_id',
        'bonus_amount',
        'bonus_amount_type'
    ];

    public function bonusType()
    {
        $this->belongsTo('App\BonusType');
    }

    public function bonusPrograms()
    {
        $this->hasMany('App\BonusProgram');
    }
}
