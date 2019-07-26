<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VkAccount extends Model
{
    protected $primaryKey = 'uid';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
