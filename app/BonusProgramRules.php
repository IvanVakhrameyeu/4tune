<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BonusProgramRules extends Model
{
    const BONUS_PROGRAM_RULE_MAX_LEVEL = 'max_level';
    const BONUS_PROGRAM_RULE_LEVELS_RULES = 'levels_rules';
    const BONUS_PROGRAM_RULE_BOOST = 'boost';
    const BONUS_PROGRAM_RULE_ACTIVATION_RULES = 'activation_rules';
    const BONUS_PROGRAM_RULE_DEPOSIT_AMOUNT = 'deposit_amount';
    const BONUS_PROGRAM_RULE_REFERRALS_COUNT = 'referrals_count';
    const BONUS_PROGRAM_RULE_NEXT_BONUS_PROGRAM = 'next_bonus_program';
    const BONUS_PROGRAM_RULE_REFERRAL_BONUS_PROGRAM = 'referral_bonus_program';

    /**
     * In This Class we need to do rules for program activation
     * All rules stores in json
     * Example:
     *    {
            "rules": {
                "max_level": 10,
                "levels_rules": {
                    "1": {
                        "boost": 0,
                        "activation_rules": {
                            "deposit_amount": 100
                        }
                    },
                    "2": {
                        "boost": 10,
                        "activation_rules": {
                            "referrals_count": 10,
                            "deposit_amount": 100
                        }
                    }
                }
            }
         }
     */

    public function bonusProgram()
    {
        $this->belongsTo('App\BonusProgram');
    }
}
