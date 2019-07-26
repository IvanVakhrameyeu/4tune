<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VkAccount extends Model
{
    protected $primaryKey = 'uid';
    public $incrementing = false;

    protected $fillable = [
        'uid',
        'nickname',
        'name',
        'email',
        'avatar',
        'token',
        'expires_in',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
