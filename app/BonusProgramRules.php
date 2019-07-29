<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BonusProgramRules extends Model
{
    const BONUS_PROGRAM_RULE_ONE_TIME_BONUS = 'one_time_bonus';
    const BONUS_PROGRAM_RULE_INFINITY_TIME_BONUS = 'infinity_time_bonus';
    const BONUS_PROGRAM_RULE_COUNT_TIME_BONUS = 'count_time_bonus';

    public function bonusProgram()
    {
        $this->belongsTo('App\BonusProgram');
    }
}
