<?php

namespace App;

use App\Permissions\HasPermissionsTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable, HasPermissionsTrait;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->password = Hash::make(str_random(8));
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'active', 'referral_link', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function vkAccount()
    {
        return $this->hasOne('App\VkAccount');
    }

    public function bonusProgramsLinks()
    {
        $this->hasMany('App\UserBonusProgram');
    }

    public function bonusPrograms()
    {
        $this->hasManyThrough('App\BonusProgram', 'App\UserBonusProgram');
    }

    public function referrer()
    {
        $this->hasOne('App\Referral');
    }

    public function referrals()
    {
        $this->hasManyThrough('App\Referral', 'App\UserBonusProgram');
    }
}
