<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BonusProgram extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'bonus_id',
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
        $this->hasMany('App\BonusProgramLink');
    }

    public function bonusRules()
    {
        $this->hasOne('App\BonusProgramRules');
    }

}
