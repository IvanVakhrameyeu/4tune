<?php

namespace App;

use App\Permissions\HasPermissionsTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Bavix\Wallet\Traits\HasWallet;
use Bavix\Wallet\Traits\HasWallets;
use Bavix\Wallet\Interfaces\Wallet;

class User extends Authenticatable implements Wallet
{
    use HasWallet, HasWallets;


    use Notifiable, HasPermissionsTrait;
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->password = Hash::make(str_random(8));


      /*  $user = Auth::user();
        $wallet = $user->createWallet([
            'name' => 'New Wallet',
            'slug' => 'my-wallet',
        ]);
        $wallet->deposit(100);*/
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
}
